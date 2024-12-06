<?php
namespace App\Http\Controllers;

use App\Models\vw_feedProf;
use Illuminate\Http\Request;
use App\Models\Address;

class ProfissionaisController extends NotificacaoController
{
    public function index(Request $request, $serviceId = null)
    {
        $notificacoes = $this->getNotifications();

        // Recebe os parâmetros da requisição
        $searchTerm = $request->input('nomeServico'); 
        $cidade = $request->input('cidade');           
        $media = $request->input('media'); 

        // Cria a consulta base
        $query = vw_feedProf::query();

        // Adiciona os filtros cumulativos
        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('serviceName', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('serviceTypeName', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        if ($cidade) {
            $query->where('city', $cidade);
        }

        if ($media) {
            $query->where('average', '>=', $media);
        }

        if ($serviceId) {
            $query->where('serviceId', $serviceId);
        }

        // Agrupamento e seleção de dados
        $professionals = $query->selectRaw('
                professionalId,
                MAX(name) as name,
                MAX(profilePic) as profilePic,
                MAX(description) as description,
                MAX(serviceName) as serviceName,
                MAX(serviceTypeName) as serviceTypeName,
                MAX(city) as city,
                MAX(uf) as uf,
                AVG(average) as average
            ')
            ->groupBy('professionalId')
            ->get();

        // Arredonda a média
        $professionals->each(function ($prof) {
            $prof->averageRounded = round($prof->average);
        });

        // Obter cidades distintas
        $cidades = Address::select('city')->distinct()->get();

        // Dados para a view
        $dados = compact('professionals', 'cidades', 'cidade', 'media', 'serviceId');

        // Adiciona notificações se o usuário for profissional
        if (auth()->check() && auth()->user()->type === 'profissional') {
            $notificacoesArray = is_array($notificacoes) ? $notificacoes : $notificacoes->toArray();
            $dados += $notificacoes;
        }

        return view('profissionais', $dados);
    }
}
