<?PHP
namespace App\Http\Controllers;

use App\Models\vw_feedProf;
use Illuminate\Http\Request;
use App\Models\Address;

class ProfissionaisController extends NotificacaoController
{
    public function index(Request $request, $serviceId) 
    {
        $notificacoes = $this->getNotifications();

        $cidades = Address::select('city')->distinct()->get();

        $query = vw_feedProf::where('serviceId', $serviceId);
        $media = $profissional->average ?? 0; 
        $mediaRedonda = round($media);
    

        if ($request->filled('cidade')) {
            $query->where('city', $request->cidade);
        }

        if ($request->filled('media')) {
            $query->where('average', '>=', $request->media);
        }

        $professionals = $query->get();
        return view('profissionais', compact('professionals', 'cidades', 'serviceId', 'media', 'mediaRedonda') + $notificacoes);
    }
}
