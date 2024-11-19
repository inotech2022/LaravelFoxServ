<?PHP
namespace App\Http\Controllers;

use App\Models\vw_feedProf;
use Illuminate\Http\Request;
use App\Models\Address;

class ProfissionaisController extends NotificacaoController
{
    public function index(Request $request, $serviceId)
    {
        // Obter notificações
        $notificacoes = $this->getNotifications();

        if (!is_array($notificacoes)) {
            $notificacoes = [];
        }

        // Obter cidades
        $cidades = Address::select('city')->distinct()->get();

        // Query para buscar profissionais
        $query = vw_feedProf::where('serviceId', $serviceId);

        if ($request->filled('cidade')) {
            $query->where('city', $request->cidade);
        }

        if ($request->filled('media')) {
            $query->where('average', '>=', $request->media);
        }

        // Obter profissionais e arredondar a média
        $professionals = $query->get();
        $professionals->each(function ($prof) {
            $prof->averageRounded = round($prof->average); // Adiciona o campo arredondado
        });

        // Retornar view
        return view('profissionais', array_merge(
            compact('professionals', 'cidades', 'serviceId'),
            $notificacoes
        ));
    }
}
