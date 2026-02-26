<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos',[SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'salvar'])->name('site.salvar');

Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login',[LoginController::class,'autenticar'])->name('site.autenticar');


Route::prefix('/app')->group(function(){
      Route::get('/home', [HomeController::class,'index'])->name('app.home');
      Route::get('/sair',[LoginController::class,'sair'])->name('app.sair');
    Route::get('/clientes',[ClienteController::class,'index'])->name('app.clientes');
    Route::get('/fornecedores',[FornecedorController::class,'index'])->name('app.fornecedor');
    Route::get('/produtos',[ProdutoController::class,'index'])->name('app.produtos');
});

Route::fallback(function(){
    echo 'A rota acessada não existe . <a href="'.route('site.index').'">Clique aqui </a> para ir para página inicial';
});