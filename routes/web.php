<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TratamentoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\SaidaController;
use App\Mail\NotificaConsulta;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/index', [\App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/registrar', [\App\Http\Controllers\Controller::class, 'registrar'])->name('registrar');
Route::post('/registrar', [\App\Http\Controllers\Controller::class, 'registrarUsuario'])->name('registrar');
Route::post('/login', [\App\Http\Controllers\Controller::class, 'login'])->name('login');
Route::get('/usuario/create', [\App\Http\Controllers\UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/usuario', [\App\Http\Controllers\UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/cancela-consulta/{id}', [\App\Http\Controllers\ConsultaController::class, 'cancelaConsultaEmail'])->name('cancela.consulta.email');
Route::delete('/cancela-consulta/{id}', [\App\Http\Controllers\ConsultaController::class, 'cancelaConsulta'])->name('cancela.consulta');
Route::get('email', function(){
    return new NotificaConsulta();
});

Route::middleware('autenticacao:padrao,visitante')->group(function(){
    Route::get('/home', [\App\Http\Controllers\Controller::class, 'home'])->name('home');
    Route::get('/cadastra-tratamento', [\App\Http\Controllers\Controller::class, 'cadastraTratamento'])->name('cadastra-tratamento');
    Route::get('/sair', [\App\Http\Controllers\Controller::class, 'sair'])->name('sair');
    Route::resource('usuario', UsuarioController::class)->except(['create','store']);
    Route::resource('tratamento', TratamentoController::class);
    Route::resource('pagamento', PagamentoController::class);
    Route::resource('paciente', PacienteController::class);
    Route::resource('consulta', ConsultaController::class);
    Route::get('dash', [\App\Http\Controllers\ConsultaController::class, 'dash'])->name('consulta.dash');
    Route::get('dash-pie', [\App\Http\Controllers\ConsultaController::class, 'graficoPie'])->name('consulta.dashPie');
    Route::post('/consulta-ajax', [\App\Http\Controllers\ConsultaController::class, 'ajaxUpdate'])->name('consulta.ajaxUpdate');
    Route::post('/procurar-paciente', [\App\Http\Controllers\PacienteController::class, 'procurar'])->name('paciente.procurar');
    Route::resource('gasto', GastoController::class);
    Route::resource('saida', SaidaController::class);
    Route::post('/pesquisar-item-mes', [\App\Http\Controllers\SaidaController::class, 'pesquisarItemPorMes'])->name('saida.pesquisaritemmes');
    Route::get('/item-mes', [\App\Http\Controllers\SaidaController::class, 'itemPorMes'])->name('saida.itemmes');
    Route::post('/pesquisar-gastos-mes', [\App\Http\Controllers\SaidaController::class, 'pesquisarGastosPorMes'])->name('saida.pesquisargastosmes');
    Route::get('/gastos-mes', [\App\Http\Controllers\SaidaController::class, 'gastosPorMes'])->name('saida.gastosmes');
    Route::post('/pesquisar-gastos-receitas', [\App\Http\Controllers\SaidaController::class, 'pesquisarGastoseReceitas'])->name('saida.pesquisargastosereceitas');
    Route::get('/gastos-e-receita', [\App\Http\Controllers\SaidaController::class, 'gastosEReceita'])->name('saida.gastosereceita');    
});