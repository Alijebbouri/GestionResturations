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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register"=>false,"reset"=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories', 'CategoryController');
Route::resource('tables', 'TableController');
Route::resource('serveurs', 'ServantsController');
Route::resource('menus', 'MenuController');
Route::resource('sales', 'SalesController');
Route::get('/payments', 'PaymentController@index');
Route::get('reports', 'ReportController@index')->name("reports.index");
Route::post('reports/generate', 'ReportController@generate')->name("reports.generate");
Route::post('reports/export', 'ReportController@export')->name("reports.export");


