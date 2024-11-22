<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\WebsiteRating;
use App\Models\Complaint; 
use App\Models\Professional;

class CentralAdministradorController extends Controller
{
    public function index(Request $request)
    {
        
        $suggestionsQuery = Suggestion::with('user:userId,name,lastName,phone');

        
        if ($request->has('filtro_sugestoes')) {
            $filtroSugestoes = $request->input('filtro_sugestoes');

            if ($filtroSugestoes === 'name') {
                $suggestionsQuery = $suggestionsQuery->orderBy('suggestionId');
            } elseif ($filtroSugestoes === 'date') {
                $suggestionsQuery = $suggestionsQuery->orderBy('suggestionDate');
            }
        }

        $suggestions = $suggestionsQuery->get();

        
        $ratingsQuery = WebsiteRating::with('user:userId,name,lastName');

        
        if ($request->has('filtro_avaliacoes')) {
            $filtroAvaliacoes = $request->input('filtro_avaliacoes');

            if ($filtroAvaliacoes === 'name') {
                $ratingsQuery = $ratingsQuery->orderBy('websiteRatingId');
            } elseif ($filtroAvaliacoes === 'date') {
                $ratingsQuery = $ratingsQuery->orderBy('ratingDate');
            }
        }

        $ratings = $ratingsQuery->get();

        
    $complaintsQuery = Complaint::with([
        'user:userId,name,lastName',
        'professional.user:userId,name,lastName'
    ]);

    
    if ($request->has('filtro_denuncias')) {
        $filtroDenuncias = $request->input('filtro_denuncias');

        if ($filtroDenuncias === 'name') {
            $complaintsQuery = $complaintsQuery->orderBy('complaintId');
        } elseif ($filtroDenuncias === 'date') {
            $complaintsQuery = $complaintsQuery->orderBy('complaintDate');
        }
    }

    $complaints = $complaintsQuery->get();

    return view('centralAdministrador', compact('suggestions', 'ratings', 'complaints'));
}
}

