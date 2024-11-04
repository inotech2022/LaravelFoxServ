<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CadastroContratoController;
use App\Http\Controllers\CadastroProfissionalController;
use App\Http\Controllers\ContratoProfissionalController;
use App\Http\Controllers\ContratoUsuarioController;
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

// Define a rota principal
Route::get('/', [IndexController::class, 'index'])-> name('index');
Route::get('/avaliacao', [AvaliacaoController::class, 'create'])->name('avaliacao');
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');
Route::get('/confirmar', [CadastroController::class, 'confirmEmail'])->name('confirm.email');
Route::get('/cadastroContrato', [CadastroContratoController::class, 'create'])->name('contratos.create');
Route::post('/cadastroContrato', [CadastroContratoController::class, 'store'])->name('contratos.store');
Route::get('/cadastroProfissional', [CadastroProfissionalController::class, 'create'])->name('cadastroProfissional');
Route::post('/cadastroProfissional', [CadastroProfissionalController::class, 'store'])->name('cadastroProfissional.store');
Route::get('/subcategorias/{id}', [CadastroProfissionalController::class, 'getSubcategories'])->name('subcategorias.get');
Route::get('/contratoProfissional', [ContratoProfissionalController::class, 'index'])->name('contratoProfissional.index');
Route::delete('/contrato/{protocol}', [ContratoProfissionalController::class, 'destroy'])->name('contrato.destroy');
Route::get('/contratoUsuario', [ContratoUsuarioController::class, 'index'])->name('contratoUsuario');
Route::get('/desempenhoProfissional', [DesempenhoProfissionalController::class, 'index'])->name('desempenhoProfissional');
Route::get('/editarContrato', [EditarContratoController::class, 'index'])->name('editarContrato');
Route::get('/editarDadosProfissional', [EditarDadosProfissionalController::class, 'index'])->name('editarDadosProfissional');
Route::get('/editarDadosUsuario', [EditarDadosUsuarioController::class, 'index'])->name('editarDadosUsuario');
Route::get('/esqueceuSenha', [EsqueceuSenhaController::class, 'index'])->name('esqueceuSenha');
Route::get('/homeProfissional', [HomeProfissionalController::class, 'index'])->name('homeProfissional');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form'); 
Route::post('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/meuPerfil', [MeuPerfilController::class, 'index'])->name('meuPerfil');
Route::get('/novaPublicacao', [NovaPublicacaoController::class, 'create'])->name('novaPublicacao');
Route::get('/perfilProfissional', [PerfilProfissionalController::class, 'index'])->name('perfilProfissional');
Route::get('/profissionais/{id}', [ProfissionaisController::class, 'index'])->name('profissionais');
Route::get('/redefinirSenha', [RedefinirSenhaController::class, 'index'])->name('redefinirSenha');
Route::get('/sejaProfissional', [SejaProfissionalController::class, 'index'])->name('sejaProfissional');
Route::get('/servicos/{id}', [ServicosController::class, 'index'])->name('servicos');
Route::get('/confirmar-email/{token}', function ($token) {
    $user = User::where('token', $token)->firstOrFail();
    $user->email_verified_at = now();
    $user->token = null; 
    $user->save();

    return redirect('/')->with('success', 'E-mail confirmado com sucesso!');
});