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

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    
});



Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/childrens/status-change', 'ChildrensController@ChangeStatus')->name('childrens.ChangeStatus');
    Route::resource('/childrens', 'ChildrensController');
    Route::resource('/classes', 'ClassesController');
});