<?PHP
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Professional;
use App\Models\User;
use App\Models\service_professionals;

class CadastroProfissionalController extends Controller
{
    public function create()
    {
        $serviceTypes = ServiceType::orderBy('serviceTypeName')->get();
        return view('cadastroProfissional', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'typeServiceId' => 'required|array',
            'serviceId' => 'required|array',
            'description' => 'required|max:100'
        ]);


        $professional = Professional::create([
            'description' => $request->description,
            'userId' => Auth::id(), 
        ]);

        $user = User::find(Auth::id());
        $user->update(['type' => 'profissional']);

        $services = $request->serviceId;
        $professional->services()->attach($services);


        return redirect()->route('cadastroProfissional')->with('success', 'Parabéns, agora você é um profissional em nossa plataforma!');
    }
    public function getSubcategories($id)
{
    $subcategories = \App\Models\Service::where('serviceTypeId', $id)->get(['serviceId', 'serviceName']); 

    return response()->json($subcategories);
}
}