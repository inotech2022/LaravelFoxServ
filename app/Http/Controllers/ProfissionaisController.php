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

    $searchTerm = $request->input('nomeServico'); 
    $cidade = $request->input('cidade');           
    $media = $request->input('media'); 

   
    $query = vw_feedProf::query();

    
    if ($searchTerm) {
        $query->where(function ($query) use ($searchTerm) {
            
            $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                  
                  ->orWhere('serviceName', 'LIKE', '%' . $searchTerm . '%')
                  
                  ->orWhere('serviceTypeName', 'LIKE', '%' . $searchTerm . '%'); 
        });
    }

    
    if ($serviceId) {
        $query->where('serviceId', $serviceId);
    }

   
    if ($cidade) {
        $query->where('city', $cidade);
    }

    
    if ($media) {
        $query->where('average', '>=', $media);
    }

    
    $professionals = $query->distinct('professionalId')->get();
    
    $professionals->each(function ($prof) {
        $prof->averageRounded = round($prof->average); 
    });

    
    $cidades = Address::select('city')->distinct()->get();

   
    return view('profissionais', compact('professionals', 'cidades', 'cidade', 'media', 'serviceId') + $notificacoes);
}

}
