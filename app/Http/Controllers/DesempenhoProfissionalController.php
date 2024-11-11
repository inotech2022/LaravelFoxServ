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

class DesempenhoProfissionalController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $professional = Professional::where('userId', $userId)->first();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
    
        // Ganhos Totais e Data de Início
        $ganhosTotais = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->sum('price');
    
        // Buscar o contrato com a data mais antiga (startDate)
        $dataInicio = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->min('startDate');
    
        // Formatar a data de início para exibir o nome do mês em português
        if ($dataInicio) {
            $dataInicio = Carbon::parse($dataInicio)->locale('pt')->isoFormat('MMMM YYYY');
        } else {
            $dataInicio = 'Sem registros';
        }
    
        // Todos os Contratos e Avaliações
        $totalContratos = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->count();
    
        $totalAvaliacoes = DB::table('ratings')
            ->where('professionalId', $professional->professionalId)
            ->count();
    
        // Ganhos Atuais
        $ganhosAtuais = DB::table('contracts')
            ->where('professionalId', $professional->professionalId)
            ->whereMonth('registrationDate', $currentMonth)
            ->whereYear('registrationDate', $currentYear)
            ->sum('price');
    
        // Contratos e Avaliações Mensais
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
    
        // Gráfico de Ganhos Mensais
        $ganhosMensais = DB::table(DB::raw("(
                SELECT MONTH(registrationDate) as mes, SUM(price) as total
                FROM contracts
                WHERE professionalId = ?
                AND YEAR(registrationDate) = ?
                GROUP BY MONTH(registrationDate)
                ) as ganhosMensais"))
            ->select('mes', 'total')
            ->addBinding($professional->professionalId, 'select')
            ->addBinding($currentYear, 'select')
            ->get()
            ->pluck('total', 'mes')
            ->toArray();
    
        // Preencher meses sem dados com 0
        $ganhosMensaisCompletos = [];
        foreach (range(1, 12) as $mes) {
            $ganhosMensaisCompletos[$mes] = $ganhosMensais[$mes] ?? 0;  // Melhor uso de null coalescing
        }
    
        // Formatar a data atual para exibir o nome do mês em português
        $currentDate = Carbon::now()->locale('pt')->isoFormat('MMMM YYYY');
    
        // Passando todas as variáveis para a view
        return view('desempenhoProfissional', compact(
            'ganhosTotais', 'dataInicio', 'totalContratos', 'totalAvaliacoes', 
            'ganhosAtuais', 'contratosMes', 'avaliacoesMes', 'ganhosMensaisCompletos', 'currentDate'
        ));
    }
    
}
