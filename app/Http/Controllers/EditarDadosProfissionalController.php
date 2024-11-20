<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Professional;
use Illuminate\Support\Facades\Auth;

class EditarDadosProfissionalController extends Controller
{
    public function index()
    {
        // Carrega o usuário com o endereço associado
        $user = User::with('address')->find(Auth::id());
        $professional = Professional::where('userId', $user->userId)->first();



        // Verifica se o usuário e o endereço foram carregados
        if (!$user) {
            return redirect()->route('index')->with('error', 'Usuário não encontrado.');
        }
        $address = $user->address;
        return view('editarDadosProfissional', compact('user','address', 'professional'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'telefone' => 'nullable|string|max:15',
            'cep' => 'nullable|string|max:9',
            'uf' => 'nullable|string|max:2',
            'cidade' => 'nullable|string|max:50',
            'bairro' => 'nullable|string|max:80',
            'endereco' => 'nullable|string|max:80',
            'numero' => 'nullable|string|max:10',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'descricao' => 'nullable|string|max:100',
        ]);

        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->route('index')->with('error', 'Usuário não encontrado.');
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('image/upload'), $imageName);
            $imagePath = 'image/upload/' . $imageName;
        }else {
            $imagePath = $user->profilePic;
        }

        $user->update([
            'phone' => $request->input('telefone', $user->phone),
            'profilePic' => $imagePath,
        ]);
        $professional = Professional::where('userId', $user->userId)->first();

        $professional->update([
            'description' => $request->input('descricao', $professional->description),
        ]);

        // Atualiza ou cria o endereço
        $user->address()->updateOrCreate(
            [],
            [
                'zipCode' => $request->input('cep', $user->address->zipCode ?? ''),
                'uf' => $request->input('uf', $user->address->uf ?? ''),
                'city' => $request->input('cidade', $user->address->city ?? ''),
                'district' => $request->input('bairro', $user->address->district ?? ''),
                'street' => $request->input('endereco', $user->address->street ?? ''),
                'number' => $request->input('numero', $user->address->number ?? ''),
            ]
        );
        
        return redirect()->route('editarDadosProfissional')->with('success', 'Dados atualizados com sucesso!');
    }
}