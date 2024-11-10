<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\Professional; 
use App\Models\vw_contracts;
use App\Models\Rating;
use TCPDF;

class ContratoProfissionalController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $professional = Professional::where('userId', $userId)->first();
        
        if (!$professional) {
            return view('contratoProfissional', ['contratos' => collect()]);
        }

        $professionalId = $professional->professionalId;
        $filtro = $request->get('filtro');
        $contratos = vw_contracts::where('professionalId', $professionalId);

        if ($filtro === 'name') {
            $contratos->orderBy('name');
        } elseif ($filtro === 'startDate') {
            $contratos->orderBy('startDate');
        }

        $contratos = $contratos->get();
        $dataAtual = now();

        // Define o status do contrato
        foreach ($contratos as $contrato) {
            if ($contrato->endDate < $dataAtual) {
                $contrato->statusContrato = 'Finalizado';
            } elseif ($contrato->startDate <= $dataAtual && $contrato->endDate >= $dataAtual) {
                $contrato->statusContrato = 'Em Andamento';
            } else {
                $contrato->statusContrato = 'Não Iniciado';
            }
        }

        $contratados = vw_contracts::where('userId', $userId)->get();
    
        foreach ($contratados as $contratado) {
            if ($contratado->endDate < $dataAtual) {
                $contratado->statusContrato = 'Finalizado';
            } elseif ($contratado->startDate <= $dataAtual && $contratado->endDate >= $dataAtual) {
                $contratado->statusContrato = 'Em Andamento';
            } else {
                $contratado->statusContrato = 'Não Iniciado';
            }
    
            $contratado->avaliado = Rating::where('protocol', $contratado->protocol)->exists();
        }

        if ($request->has('filtro')) {
            $filtro = $request->input('filtro');
            
            if ($filtro === 'name') {
                $contratos = $contratos->sortBy('name')->values();
            } elseif ($filtro === 'startDate') {
                $contratos = $contratos->sortBy('startDate')->values();
            }
        }

        return view('contratoProfissional', compact('contratos', 'contratados'));
    }
    public function gerarPdf($protocol)
    {
        // Recuperar contrato e dados do profissional
        $contrato = vw_contracts::where('protocol', $protocol)->first();
        if (!$contrato) {
            return redirect()->route('contratoProfissional')->with('error', 'Contrato não encontrado');
        }

        $userId = auth()->id();
        $professional = Professional::where('userId', $userId)->first();
        if (!$professional || $contrato->professionalId !== $professional->professionalId) {
            return redirect()->route('contratoProfissional')->with('error', 'Você não tem permissão para acessar este contrato.');
        }

        // Formatar as datas para o formato brasileiro (dd/mm/aaaa)
        $dataInicialFormatada = date('d/m/Y', strtotime($contrato->startDate));
        $dataFinalFormatada = date('d/m/Y', strtotime($contrato->endDate));

        // Gerar PDF
        $pdf = new TCPDF();
        $pdf->SetTitle('Contrato');
        $pdf->AddPage();

        // Inserir o conteúdo do contrato
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'CONTRATO DE PRESTAÇÃO DE SERVIÇOS', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Helvetica', '', 12);
        $html = <<<EOD
<h2 style="text-align: center; font-size: 16px; font-weight: bold;">Entre:</h2>
<p style="font-size: 12px;"><strong>Nome do Prestador de Serviços:</strong> {$contrato->professionalName}, doravante denominado "Prestador", brasileiro, portador do CPF nº {$contrato->professionalCpf}.</p>
<p style="font-size: 12px;">E,</p>
<p style="font-size: 12px;"><strong>Nome do Cliente:</strong> {$contrato->name}, doravante denominado "Cliente", brasileiro, portador do CPF nº {$contrato->cpf}.</p>

<h2 style="font-size: 14px; font-weight: bold;">1. Objeto do Contrato:</h2>
<p style="font-size: 12px;">O Prestador concorda em fornecer os seguintes serviços de <strong>{$contrato->serviceName}</strong> ao Cliente:</p>
<p style="font-size: 12px;">{$contrato->description}</p>

<h2 style="font-size: 14px; font-weight: bold;">2. Honorários:</h2>
<p style="font-size: 12px;">O Cliente pagará ao Prestador a quantia de <strong>{$contrato->price}</strong> reais pelos serviços prestados.</p>

<h2 style="font-size: 14px; font-weight: bold;">3. Prazo:</h2>
<p style="font-size: 12px;">Este contrato entra em vigor na data de assinatura e permanecerá em vigor até a conclusão dos serviços, conforme acordado entre as partes. (<strong>{$dataInicialFormatada} - {$dataFinalFormatada}</strong>)</p>

<h2 style="font-size: 14px; font-weight: bold;">4. Obrigações do Prestador:</h2>
<ul style="font-size: 12px; padding-left: 20px;">
    <li>Executar os serviços acordados com diligência e profissionalismo.</li>
    <li>Manter a confidencialidade de qualquer informação confidencial do Cliente.</li>
</ul>

<h2 style="font-size: 14px; font-weight: bold;">5. Obrigações do Cliente:</h2>
<ul style="font-size: 12px; padding-left: 20px;">
    <li>Pagar pontualmente pelos serviços prestados pelo Prestador.</li>
    <li>Fornecer acesso aos locais onde os serviços serão prestados, bem como qualquer informação ou equipamento necessário para a realização dos serviços.</li>
</ul>

<h2 style="font-size: 14px; font-weight: bold;">6. Lei Aplicável:</h2>
<p style="font-size: 12px;">Este contrato será regido e interpretado de acordo com as leis do Brasil.</p>

<h2 style="font-size: 14px; font-weight: bold;">7. Disposições Gerais:</h2>
<p style="font-size: 12px;">Este contrato constitui o acordo integral entre as partes e substitui todos os acordos anteriores ou contemporâneos, escritos ou orais, relacionados ao objeto deste contrato.</p>
<p style="font-size: 12px;">Nenhuma alteração ou renúncia a qualquer disposição deste contrato será válida a menos que feita por escrito e assinada por ambas as partes.</p>

<h2 style="font-size: 14px; font-weight: bold;">Assinaturas:</h2>
<p style="font-size: 12px;">As partes abaixo assinadas concordam com os termos deste contrato:</p>
<p style="font-size: 12px;">Local: ______________ Data: _________________</p>
<p style="font-size: 12px;">Assinatura do Prestador: <strong>{$contrato->professionalName}</strong></p>
<p style="font-size: 12px;">CPF: _______________</p>
<p style="font-size: 12px;">Assinatura do Cliente: <strong>{$contrato->name}</strong></p>
<p style="font-size: 12px;">CPF: _______________</p>
EOD;

        $pdf->writeHTML($html, true, false, true, false, '');
        // Saída do PDF
        return $pdf->Output('contrato_'.$protocol.'.pdf', 'D');
    }


    public function destroy($protocol)
    {
        $contrato = Contract::where('protocol', $protocol)->first();

        if ($contrato) {
            \DB::table('ratings')
                ->where('protocol', $protocol)
                ->update(['protocol' => null]);

            $contrato->delete();

            return redirect()->route('contratoProfissional')->with('success', 'Contrato excluído com sucesso!');
        }

        return redirect()->route('contratoProfissional')->with('error', 'Contrato não encontrado.');
    }
}
