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

    // Garantir que $notificacoes é um array
    if (!is_array($notificacoes)) {
        $notificacoes = [];
    }

    // Obter cidades
    $cidades = Address::select('city')->distinct()->get();

    // Query para buscar profissionais
    $query = vw_feedProf::where('serviceId', $serviceId);

    // Calcular média redonda
    $media = $profissional->average ?? 0;
    $mediaRedonda = round($media);

    // Filtros opcionais
    if ($request->filled('cidade')) {
        $query->where('city', $request->cidade);
    }

    if ($request->filled('media')) {
        $query->where('average', '>=', $request->media);
    }

    // Obter profissionais
    $professionals = $query->get();

    // Retornar view com dados combinados
    return view('profissionais', array_merge(
        compact('professionals', 'cidades', 'serviceId', 'media', 'mediaRedonda'),
        $notificacoes
    ));
}
}
