<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Rating; 


class DesempenhoProfissionalController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // Ganhos Totais e Data de Início
    $ganhosTotais = DB::table('contracts')
        ->where('professionalId', $user->id)
        ->sum('price');

    $dataInicio = DB::table('contracts')
        ->where('professionalId', $user->id)
        ->min('registrationDate');

    // Todos os Contratos e Avaliações
    $totalContratos = DB::table('contracts')
        ->where('professionalId', $user->id)
        ->count();

    $totalAvaliacoes = DB::table('ratings')
        ->where('professionalId', $user->id)
        ->count();

    // Ganhos Atuais
    $ganhosAtuais = DB::table('contracts')
        ->where('professionalId', $user->id)
        ->whereMonth('registrationDate', $currentMonth)
        ->whereYear('registrationDate', $currentYear)
        ->sum('price');

    // Contratos e Avaliações Mensais
    $contratosMes = DB::table('contracts')
        ->where('professionalId', $user->id)
        ->whereMonth('registrationDate', $currentMonth)
        ->whereYear('registrationDate', $currentYear)
        ->count();

    $avaliacoesMes = DB::table('ratings')
        ->where('professionalId', $user->id)
        ->whereMonth('ratingDate', $currentMonth)
        ->whereYear('ratingDate', $currentYear)
        ->count();

    // Gráfico de Ganhos Mensais
    $ganhosMensais = DB::table('contracts')
        ->select(DB::raw('MONTH(registrationDate) as mes'), DB::raw('SUM(price) as total'))
        ->where('professionalId', $user->id)
        ->whereYear('registrationDate', $currentYear)
        ->groupBy('mes')
        ->orderBy('mes')
        ->get()
        ->pluck('total', 'mes');

    return view('desempenhoProfissional', compact(
        'ganhosTotais', 'dataInicio', 'totalContratos', 'totalAvaliacoes', 
        'ganhosAtuais', 'contratosMes', 'avaliacoesMes', 'ganhosMensais'
    ));
}
}
