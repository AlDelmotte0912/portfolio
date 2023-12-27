<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;

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

    Route::get('/', function () {
    return view('home');
});


// Routes for articles
Route::prefix('/articles')->name('articles.')->controller(ArticlesController::class)->group(function () {
    Route::get('/all','all')->name('all');
    Route::get('/show/{article}' ,'show')->name('show');
    Route::get('/create' , 'create')->name('create')->middleware('auth');
    Route::post('/create' , 'store')->middleware('auth');
    Route::get('/edit/{article}' , 'edit')->name('edit')->middleware('auth');
    Route::post('/edit/{article}' , 'update')->middleware('auth');
    Route::post('/show/{article}' , 'delete')->middleware('auth');
    });

// Routes for users
Route::get('/login', [UsersController::class , 'login'])->name('users.login');
Route::delete('/logout', [UsersController::class , 'logout'])->name('users.logout');
Route::post('/login', [UsersController::class , 'doLogin'])->name('doLogin');
Route::get('/signIn', [UsersController::class , 'signIn'])->name('users.signIn');
Route::post('/signIn', [UsersController::class , 'doSignIn'])->name('users.doSignIn');




