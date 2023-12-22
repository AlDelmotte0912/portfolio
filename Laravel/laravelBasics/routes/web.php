<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoListController;

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

Route::get('/',[todoListController::class, 'index']);

Route::post('/saveItemRoute',[todoListController::class,'saveItem'])->name('saveItem');
Route::post('/markComplete/{id}',[todoListController::class,'markComplete'])->name('markComplete');

//login
route::get('login',function(){
    return view('login');
});

Route::post('/user',[todoListController::class,'login'])->name('user');

