<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Professional;
use App\Models\Publication;
use App\Models\vw_ratings;
use App\Models\vw_likes;
use App\Models\User;


class NotificacaoController extends Controller
{
    public function getNotifications()
    {
        $userId = Auth::id();
        $profissional = Professional::where('userId', $userId)->first();

        if (!$profissional) {
            return redirect()->route('index')->with('error', 'Profissional não encontrado.');
        }

        $professionalId = $profissional->professionalId;

        $avaliacoes = vw_ratings::where('professionalId', $professionalId)
            ->get(['name', 'lastName', 'profilePic', 'ratingDate']);

        $curtidas = vw_likes::where('professionalId', $professionalId)
        ->get(['name', 'lastName', 'profilePic', '.likeDate']);
        
        return compact('curtidas', 'avaliacoes');
    }
}
