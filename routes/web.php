<?php

use App\Http\Controllers\Auth\GithubController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;




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
/*Route::get('/github', function () {

    dd(env('GITHUB_CLIENT_ID'),env('GITHUB_CLIENT_SECRET'),env('GITHUB_REDIRECT'));
    // return Socialite::driver('github')->redirect();
});*/


Route::get('/a', function () {
    return view('welcome');
});

Route::get('/',[MainController::class,'home'])->name('home');

Route::get('/articles',[MainController::class,'index'])->name('articles');
 //M1
//Route::get('/article/{slug}',[MainController::class,'show'])->name('article');//Route [article] not defined. ki mt3mlhch ->name('article')

//M2 : route binding
Route::get('/article/{art:slog}',[MainController::class,'show'])->name('article');//recevoir article  avk propriete slog



 Auth::routes();

Route::prefix('admin')->middleware('admin')->group(function(){
     Route::get('article',[ArticleController::class,'index'])->name('article.index');//protection de la route avec middleware
    Route::get('article/create',[ArticleController::class,'create'])->name('article.create');
    Route::post('article/store',[ArticleController::class,'store'])->name('article.store');
    Route::delete('article/{deletArt}/delete',[ArticleController::class,'delete'])->name('article.delete');
//ou bien Route::delete('/admin/article/{deletArt:id}/delete',[ArticleController::class,'delete'])->middleware('admin')->name('article.delete');

Route::get('article/{article}/edit',[ArticleController::class,'edit'])->name('article.edit');
//put pour la modification

Route::put('article/{article:id}/update',[ArticleController::class,'update'])->name('article.update');

});
/*  Route::prefix('/admin')->middleware('admin')->group(function(){


 Route::resource('/article',ArticleController::class)->except([
    'show'

]);
}); */

Route::get('/auth/github',[GithubController::class,'authtogit'])->name('git.auth');
Route::get('/auth/github/redirect',[GithubController::class,'redirectfromgit'])->name('git.redirect');
///auth/github/redirect    c'est le meme dans .env et dans github.com


