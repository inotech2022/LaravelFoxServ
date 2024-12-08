<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AvaliacaoPlataformaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CadastroContratoController;
use App\Http\Controllers\CadastroProfissionalController;
use App\Http\Controllers\CentralAdministradorController;
use App\Http\Controllers\ContratoProfissionalController;
use App\Http\Controllers\ContratoUsuarioController;
use App\Http\Controllers\DenunciaAdmController;
use App\Http\Controllers\DesempenhoProfissionalController;
use App\Http\Controllers\EditarContratoController;
use App\Http\Controllers\EditarDadosProfissionalController;
use App\Http\Controllers\EditarDadosUsuarioController;
use App\Http\Controllers\EsqueceuSenhaController;
use App\Http\Controllers\HomeProfissionalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MeuPerfilController;
use App\Http\Controllers\NovaPublicacaoController;
use App\Http\Controllers\PerfilProfissionalController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\RedefinirSenhaController;
use App\Http\Controllers\SejaProfissionalController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\PoliticaPrivacidadeController;


// Define a rota principal
Route::get('/', [IndexController::class, 'index'])-> name('index');
Route::get('/politicaPrivacidade', [PoliticaPrivacidadeController::class, 'index'])-> name('politicaPrivacidade');
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');
Route::get('/confirmar', [CadastroController::class, 'confirmEmail'])->name('confirm.email');
Route::get('/esqueceuSenha', [EsqueceuSenhaController::class, 'index'])->name('esqueceuSenha');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form'); 
Route::post('/login', [AuthController::class, 'login'])->name('login'); 

Route::middleware('auth')->group(function () {
    Route::post('/', [IndexController::class, 'store'])-> name('sugestao');
Route::post('/denuncia', [PerfilProfissionalController::class, 'store'])->name('denuncia.store');
Route::get('/avaliacao', [AvaliacaoController::class, 'create'])->name('avaliacao');
Route::post('/avaliacao', [AvaliacaoController::class, 'store'])->name('avaliacao');
Route::get('/avaliacaoPlataforma', [AvaliacaoPlataformaController::class, 'create'])->name('avaliacaoPlataforma');
Route::post('/avaliacaoPlataforma', [AvaliacaoPlataformaController::class, 'store'])->name('avaliacao.salvar');
Route::get('/cadastroContrato', [CadastroContratoController::class, 'create'])->name('cadastroContrato');
Route::post('/cadastroContrato', [CadastroContratoController::class, 'store'])->name('cadastroContrato.store');
Route::get('/cadastroProfissional', [CadastroProfissionalController::class, 'create'])->name('cadastroProfissional');
Route::post('/cadastroProfissional', [CadastroProfissionalController::class, 'store'])->name('cadastroProfissional.store');
Route::get('/centralAdministrador', [CentralAdministradorController::class, 'index'])->name('centralAdministrador');
Route::get('/subcategorias/{id}', [CadastroProfissionalController::class, 'getSubcategories'])->name('subcategorias.get');
Route::get('/contratoProfissional', [ContratoProfissionalController::class, 'index'])->name('contratoProfissional');
Route::delete('/contrato/{protocol}', [ContratoProfissionalController::class, 'destroy'])->name('contrato.destroy');
Route::get('/contrato/{protocol}/gerar-pdf', [ContratoProfissionalController::class, 'gerarPdf'])->name('contrato.gerarPdf');
Route::get('/contratoUsuario', [ContratoUsuarioController::class, 'index'])->name('contratoUsuario');
Route::get('/denunciaAdm/{id}', [DenunciaAdmController::class, 'index'])->name('denunciaAdm');
Route::delete('/banir-profissional/{id}', [DenunciaAdmController::class, 'destroyAccount'])->name('banir.profissional');
Route::get('/desempenhoProfissional', [DesempenhoProfissionalController::class, 'index'])->name('desempenhoProfissional');
Route::post('editarContrato/{protocol}', [EditarContratoController::class, 'update'])->name('editarContrato.update');
Route::get('/editarContrato/{protocol}', [EditarContratoController::class, 'index'])->name('editarContrato');
Route::post('/editarDadosProfissional', [EditarDadosProfissionalController::class, 'update'])->name('editarDadosProfissional.update');
Route::get('/editarDadosProfissional', [EditarDadosProfissionalController::class, 'index'])->name('editarDadosProfissional');
Route::get('/editarDadosUsuario', [EditarDadosUsuarioController::class, 'index'])->name('editarDadosUsuario');
Route::post('/editarDadosUsuario', [EditarDadosUsuarioController::class, 'update'])->name('editarDadosUsuario.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/meuPerfil', [MeuPerfilController::class, 'index'])->name('meuPerfil');
Route::get('/novaPublicacao', [NovaPublicacaoController::class, 'create'])->name('novaPublicacao');
Route::post('/novaPublicacao', [NovaPublicacaoController::class, 'store'])->name('novaPublicacao.store');
Route::get('/perfilProfissional/{professionalId}', [PerfilProfissionalController::class, 'index'])->name('perfilProfissional');
Route::post('/toggle-like', [PerfilProfissionalController::class, 'toggleLike'])->name('toggle.like');
Route::get('/profissionais/{serviceId?}', [ProfissionaisController::class, 'index'])->name('profissionais');
Route::delete('publicacao/{publicationId}', [MeuPerfilController::class, 'destroy'])->name('publicacao.destroy');
Route::delete('/excluir-conta', [MeuPerfilController::class, 'destroyAccount'])->name('excluirConta');
Route::get('/getNotificacoes', [NotificacaoController::class, 'getNotifications'])->name('getNotificacoes');
Route::get('/redefinirSenha', [RedefinirSenhaController::class, 'index'])->name('redefinirSenha');
Route::post('/redefinirSenha', [RedefinirSenhaController::class, 'updatePassword'])->name('redefinirSenha.update');
Route::get('/sejaProfissional', [SejaProfissionalController::class, 'index'])->name('sejaProfissional');
Route::get('/servicos/{serviceId}', [ServicosController::class, 'index'])->name('servicos');
Route::get('/confirmar-email/{token}', function ($token) {
    $user = User::where('token', $token)->firstOrFail();
    $user->email_verified_at = now();
    $user->token = null; 
    $user->save();

    return redirect('/')->with('success', 'E-mail confirmado com sucesso!');
});
});

