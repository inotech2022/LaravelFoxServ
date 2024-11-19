<?PHP
namespace App\Http\Controllers;

use App\Models\vw_feedProf;
use Illuminate\Http\Request;
use App\Models\Address;

class ProfissionaisController extends NotificacaoController
{
    public function index(Request $request, $serviceId = null)
{
    $searchTerm = $request->input('nomeServico'); // Busca por nome do profissional ou serviço
    $cidade = $request->input('cidade');           // Filtro de cidade
    $media = $request->input('media');             // Filtro de avaliação

    // Criar a consulta inicial
    $query = vw_feedProf::query();

    // Verifique se a variável $searchTerm existe
    if ($searchTerm) {
        $query->where(function ($query) use ($searchTerm) {
            // Nome do profissional
            $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                  // Nome do serviço
                  ->orWhere('serviceName', 'LIKE', '%' . $searchTerm . '%')
                  // Tipo de serviço
                  ->orWhere('serviceTypeName', 'LIKE', '%' . $searchTerm . '%'); // Use o nome correto da coluna
        });
    }

    // Filtro por serviceId (se disponível)
    if ($serviceId) {
        $query->where('serviceId', $serviceId);
    }

    // Filtro por cidade
    if ($cidade) {
        $query->where('city', $cidade);
    }

    // Filtro por avaliação (média)
    if ($media) {
        $query->where('average', '>=', $media);
    }

    // Selecionar os profissionais de forma distinta para evitar duplicação
    $professionals = $query->distinct('professionalId')->get();

    // Adicionar o campo arredondado para cada profissional
    $professionals->each(function ($prof) {
        $prof->averageRounded = round($prof->average); // Adiciona o campo arredondado
    });

    // Obter as cidades para o filtro
    $cidades = Address::select('city')->distinct()->get();

    // Retornar a view com os profissionais e filtros
    return view('profissionais', compact('professionals', 'cidades', 'cidade', 'media', 'serviceId'));
}

}
