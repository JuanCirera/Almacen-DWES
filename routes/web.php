<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactoController;
use App\Models\Article;
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

Route::get('/', function () {
    $articulos=Article::with("user")->orderBy("id","desc")->paginate(15);
    return view('welcome',compact("articulos"));
})->name("inicio");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [ArticleController::class,'index'])->name('dashboard');
    Route::resource("articles",ArticleController::class);
    Route::get("/contacto",[ContactoController::class,'index'])->name("contacto");
    Route::post("/contacto",[ContactoController::class,'send'])->name("send");
});
