<?PHP
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Professional;
use App\Models\User;

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
            'description' => 'required|max:100',
            'userId' => 'required|exists:users,userId',
        ]);

        $professional = Professional::create([
            'description' => $request->description,
            'userId' => Auth::id(),
        ]);

        $user = User::find($request->userId);
        $user->update(['type' => 'profissional']);

        foreach ($request->typeServiceId as $index => $typeServiceId) {
            $professional->services()->create([
                'serviceId' => $request->serviceId[$index],
                'typeServiceId' => $typeServiceId,
            ]);
        }

        return redirect()->route('index')->with('success', 'Parabéns, agora você é um profissional em nossa plataforma!');
    }
    public function getSubcategories($id)
{
    $subcategories = \App\Models\Service::where('serviceTypeId', $id)->get(['serviceId', 'serviceName']); // Ajuste os campos conforme seu banco de dados

    return response()->json($subcategories);
}
}
