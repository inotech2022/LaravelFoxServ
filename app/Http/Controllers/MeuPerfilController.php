<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\vw_feedProf;
use App\Models\vw_ratings;
use App\Models\User;
use App\Models\Publication;
use App\Models\Professional;
use App\Models\Adress;
use App\Models\Complaint;
use App\Models\Contract;
use App\Models\Service_Professional;
use App\Models\Rating;

class MeuPerfilController extends NotificacaoController
{
    public function index()
    {
        $notificacoes = $this->getNotifications();

        $userId = Auth::id(); 

        $profissional = vw_feedProf::where('userId', $userId)->first();
        

        if (!$profissional) {
            return redirect()->back()->with('error', 'Profissional não encontrado.');
        }

        $media = $profissional->average ?? 0;
        $mediaRedonda = round($media);

        $publicacoes = Publication::where('professionalId', $profissional->professionalId)->get();
        $avaliacoes = vw_ratings::where('professionalId', $profissional->professionalId)->get();
        $servicos = vw_feedProf::getServicosPorProfissional($profissional->professionalId);
        $tipoServicos = vw_feedProf::getCategoriaPorProfissional($profissional->professionalId);

        return view('meuPerfil', [
            'profissional' => $profissional,
            'publicacoes' => $publicacoes,
            'avaliacoes' => $avaliacoes,
            'media' => $media,
            'mediaRedonda' => $mediaRedonda,
            'servicos' => $servicos,
            'tipoServicos' => $tipoServicos,
        ] + $notificacoes);
    }

    public function destroy($publicationId)
{
    $userId = Auth::id();
    $profissional = vw_feedProf::where('userId', $userId)->first();

    $publicacao = Publication::where('publicationId', $publicationId)
        ->where('professionalId', $profissional->professionalId)
        ->first();

    if ($publicacao) {
        // Excluir curtidas associadas à publicação
        \DB::table('user_publication')->where('publicationId', $publicationId)->delete();

        // Excluir a publicação
        $publicacao->delete();

        return redirect()->back()->with('success', 'Publicação excluída com sucesso!');
    }

    return redirect()->back()->with('error', 'Publicação não encontrada ou não autorizada.');
}


public function destroyAccount()
{
    $userId = Auth::id();
    $profissional = vw_feedProf::where('userId', $userId)->first();

    Log::info('Iniciando exclusão de conta para userId: ' . $userId);

    if (!$profissional) {
        Log::warning('Profissional não encontrado para userId: ' . $userId);
        return redirect()->back()->with('error', 'Profissional não encontrado.');
    }

    try {
        DB::transaction(function () use ($profissional, $userId) {
            Log::info('Excluindo registros associados ao userId e professionalId.');

            // Excluir registros associados ao usuário em ordem necessária
            DB::table('complaints')->where('userId', $userId)->delete();
            Log::info("Denúncias associadas ao usuário excluídas.");

            DB::table('complaints')->where('professionalId', $profissional->professionalId)->delete();
            Log::info("Denúncias associadas ao profissional excluídas.");

            DB::table('user_publication')
                ->whereIn('publicationId', function ($query) use ($profissional) {
                    $query->select('publicationId')
                          ->from('publications')
                          ->where('professionalId', $profissional->professionalId);
                })
                ->delete();
            Log::info("Curtidas associadas às publicações excluídas.");

            DB::table('publications')->where('professionalId', $profissional->professionalId)->delete();
            Log::info("Publicações excluídas.");

            DB::table('user_publication')->where('userId', $userId)->delete();
            Log::info("Curtidas feitas pelo usuário excluídas.");

            DB::table('ratings')->where('professionalId', $profissional->professionalId)->delete();
            Log::info("Avaliações excluídas.");

            DB::table('websiteRatings')->where('userId', $userId)->delete();
            Log::info("Avaliações do site excluídas.");

            DB::table('contracts')->where('professionalId', $profissional->professionalId)->delete();
            Log::info("Contratos associados ao profissional excluídos.");

            DB::table('contracts')->where('userId', $userId)->delete();
            Log::info("Contratos associados ao usuário excluídos.");

            DB::table('service_professionals')->where('professionalId', $profissional->professionalId)->delete();
            Log::info("Associações de serviços excluídas.");

            DB::table('professionals')->where('professionalId', $profissional->professionalId)->delete();
            Log::info("Registro do profissional excluído.");

            DB::table('addresses')->where('userId', $userId)->delete();
            Log::info("Endereço excluído.");

            // Excluir sugestões associadas ao usuário
            DB::table('suggestions')->where('userId', $userId)->delete();
            Log::info("Sugestões associadas ao usuário excluídas.");

            DB::table('users')->where('userId', $userId)->delete();
            Log::info("Conta de usuário excluída.");
        });

        Log::info('Conta excluída com sucesso para userId: ' . $userId);
        Auth::logout();
        return redirect('/')->with('success', 'Conta excluída com sucesso!');
    } catch (\Exception $e) {
        Log::error('Erro ao excluir conta para userId: ' . $userId . ' - Mensagem: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Erro ao excluir a conta.');
    }
}

}
