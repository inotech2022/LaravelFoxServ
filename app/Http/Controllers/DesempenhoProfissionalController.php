<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Rating; 
use App\Models\Professional; 

class DesempenhoProfissionalController extends NotificacaoController
{
    public function index()
    {

        $notificacoes = $this->getNotifications();

        $userId = Auth::id();
        $professional = Professional::where('userId', $userId)->first();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
    
        
        $ganhosTotais = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->sum('price');
    
        
        $dataInicio = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->min('startDate');
    
        
        if ($dataInicio) {
            $dataInicio = Carbon::parse($dataInicio)->locale('pt')->isoFormat('MMMM YYYY');
        } else {
            $dataInicio = 'Sem registros';
        }
    
        
        $totalContratos = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->count();
    
        $totalAvaliacoes = DB::table('ratings')
            ->where('professionalId', $professional->professionalId)
            ->count();
    
        
        $ganhosAtuais = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->whereMonth('registrationDate', $currentMonth)
            ->whereYear('registrationDate', $currentYear)
            ->sum('price');
    
        
        $contratosMes = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->whereMonth('registrationDate', $currentMonth)
            ->whereYear('registrationDate', $currentYear)
            ->count();
    
        $avaliacoesMes = DB::table('ratings')
            ->where('professionalId', $professional->professionalId)
            ->whereMonth('ratingDate', $currentMonth)
            ->whereYear('ratingDate', $currentYear)
            ->count();
    
        
        $ganhosMensais = DB::table('contracts')
        ->where('professionalId', $professional->professionalId)
        ->whereYear('startDate', $currentYear)
        ->selectRaw('MONTH(startDate) as mes, COALESCE(SUM(price), 0) as total')
        ->groupBy('mes')
        ->pluck('total', 'mes')
        ->toArray();
    
        
        $ganhosMensaisCompletos = [];
        foreach (range(1, 12) as $mes) {
            $ganhosMensaisCompletos[$mes] = $ganhosMensais[$mes] ?? 0;
        }
        
        $currentDate = Carbon::now()->locale('pt')->isoFormat('MMMM YYYY');
        
        $avaliacoesPorEstrela = DB::table('ratings')
        ->where('professionalId', $professional->professionalId)
        ->selectRaw('starAmount as estrela, COUNT(*) as quantidade')
        ->groupBy('estrela')
        ->pluck('quantidade', 'estrela')
        ->toArray();

        
        for ($i = 1; $i <= 5; $i++) {
        $avaliacoesPorEstrela[$i] = $avaliacoesPorEstrela[$i] ?? 0;
        }

        
        return view('desempenhoProfissional', compact(
        'ganhosTotais', 'dataInicio', 'totalContratos', 'totalAvaliacoes', 
        'ganhosAtuais', 'contratosMes', 'avaliacoesMes', 'ganhosMensaisCompletos', 
        'currentDate', 'avaliacoesPorEstrela'
        )+ $notificacoes);
    }
    
}
