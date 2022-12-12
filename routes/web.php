<?php

use App\Http\Controllers\Admin\BebidaController;
use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\ComidaController;
use App\Http\Controllers\Admin\FotoBebidaController;
use App\Http\Controllers\Admin\FotoComidaController;
use App\Http\Controllers\Admin\FotoUsuarioController;
use App\Http\Controllers\Admin\FuncionarioController;
use App\Http\Controllers\Admin\IngredienteControler;
use App\Http\Controllers\Admin\MedidaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\User\BebidaController as UserBebidaController;
use App\Http\Controllers\User\ComidaController as UserComidaController;
use App\Http\Controllers\User\UsuarioController as UserUsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/auth', [PessoaController::class, 'auth'])->name('auth.pessoa');
Route::get('/logout', [PessoaController::class, 'logout'])->name('logout.pessoa');

Route::get('/', [HomeController::class, 'inicio'])->name('inicio');

Route::middleware(['funcionario'])->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('cidades', CidadeController::class)->except(['show']);
        
        Route::resource('funcionarios', FuncionarioController::class)->except(['show', 'destroy']);

        Route::resource('usuarios', UsuarioController::class)->except(['show']);
        Route::resource('usuarios.fotos', FotoUsuarioController::class)->only(['index', 'store', 'destroy']);

        Route::resource('medidas', MedidaController::class)->except(['show']);

        Route::resource('bebidas', BebidaController::class)->except(['show']);
        Route::resource('bebidas.fotos', FotoBebidaController::class)->only(['index', 'store', 'destroy']);

        Route::resource('ingredientes', IngredienteControler::class)->except(['show']);

        Route::resource('comidas', ComidaController::class)->except(['show']);
        Route::resource('comidas.fotos', FotoComidaController::class)->only(['index', 'store', 'destroy']);
    });
});

Route::prefix('user')->name('user.')->group(function(){

    Route::resource('bebidas', UserBebidaController::class)->only(['index', 'show']);
    //Route::resource('bebidas.fotos', FotoBebidaController::class)->only('index');

    Route::resource('comidas', UserComidaController::class)->only(['index', 'show']);
    //Route::resource('comidas.fotos', FotoComidaController::class)->only('index');

    Route::resource('usuarios', UserUsuarioController::class)->except(['index']);

});
