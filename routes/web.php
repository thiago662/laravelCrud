<?php

use App\Http\Controllers\ControladorCategoria;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorProduto;

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

Route::get('/', function () {
    return view('index');
});

Route::resource('categorias', ControladorCategoria::class);

Route::get('produtos', [ControladorProduto::class, 'indexView'])->name('produtos');

//Route::resource('produtos', ControladorProduto::class);

/*
//Route::get('produtos', 'ControladorProduto@index');

Route::get('produtos', [ControladorProduto::class, 'index']);

Route::get('categorias', [ControladorCategoria::class, 'index']);

Route::get('categorias/novo', [ControladorCategoria::class, 'create']);

Route::post('categorias', [ControladorCategoria::class, 'store']);
*/