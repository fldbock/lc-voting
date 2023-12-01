<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('index');
});

Route::group(['middleware' => ['auth']], function(){
    Route::post('/logout', function(){
        return '';
    })->name('logout');
});


require __DIR__.'/auth.php';
