<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstController;

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

Route::controller(firstController::class)->group(function(){
    Route::get('/','table');
    Route::get('insert-page','insert');
    Route::post('posted','valid');
    Route::get('edited-page/{id}','edit');
    Route::post('update-page','update');
    Route::get('deleted-page/{ids}','delete');
});
