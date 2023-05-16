<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TratamentoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;

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

Route::middleware('autenticacao:padrao,visitante')->group(function(){
    Route::get('/home', [\App\Http\Controllers\Controller::class, 'home'])->name('home');
    Route::get('/cadastra-tratamento', [\App\Http\Controllers\Controller::class, 'cadastraTratamento'])->name('cadastra-tratamento');
    Route::get('/sair', [\App\Http\Controllers\Controller::class, 'sair'])->name('sair');
    Route::resource('usuario', UsuarioController::class)->except(['create','store']);
    Route::resource('tratamento', TratamentoController::class);
    Route::resource('pagamento', PagamentoController::class);
    Route::resource('paciente', PacienteController::class);
    Route::resource('consulta', ConsultaController::class);
});