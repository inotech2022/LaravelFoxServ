<?PHP
namespace App\Http\Controllers;

use App\Models\vw_feedProf;
use Illuminate\Http\Request;

class ProfissionaisController extends Controller
{
    public function index($serviceId) 
    {
        $professionals = vw_feedProf::where('serviceId', $serviceId)->get();

        return view('profissionais', compact('professionals', 'serviceId')); 
    }
}
