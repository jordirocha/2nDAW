<?php

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

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/inicio', 'home')->name('home.index');
    Route::get('/juego', 'game');
    Route::get('/tecnologias', 'technologies');
    Route::get('/descargar', 'download');
    Route::get('/sobrenosotros', 'aboutUs');
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'login');
    Route::get('/register', 'register');
    Route::get('/logout', 'logout');
    Route::post('/storeUser', 'storeUser')->name('user.store');
    Route::post('/loginUser', 'loggingUser')->name('user.login');
});

Route::controller(App\Http\Controllers\RankingController::class)->group(function () {
    Route::get('/puntuaciones', 'ranking');
});

Route::controller(App\Http\Controllers\CommentController::class)->group(function () {
    Route::get('/comentarios', 'comments')->name('comments.comments');;
    Route::post('/delcomment/{id}', 'deleteComment')->name('comments.delete');
    Route::get('/getComment/{id}', 'getComment')->name('comments.get');
    Route::post('/modifyComment/{id}', 'editComment')->name('comments.edit');
    Route::post('/addComment', 'storeComment')->name('comments.add');
});

// Route::group(['middleware' => ['web']], function () {
//     Route::get('/', function () {
//         return view('welcome');
//     });
//     Route::get('/inicio', function () {
//         return view('welcome');
//     });
// });
