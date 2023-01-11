<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MessageMail;
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
    return view('welcome');
});
Route::get('/mailme', function () {
    Mail::to("condemorcant@gmail.com")->send(new MessageMail());
    return "Email enviado";
});

//Auth::routes();
Route::get('task/exportation/{extensao}', 'App\Http\Controllers\TaskController@exportation')
    ->name('task.exportation');

Route::get('task/exporter', 'App\Http\Controllers\TaskController@exporter')
    ->name('task.exporter');

Auth::routes(['verify' => true]);

//Route::resource('task', 'App\Http\Controllers\TaskController');
Route::get('/logoutme','App\Http\Controllers\TaskController@logoutme')->name('logoutme');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('task', 'App\Http\Controllers\TaskController')->middleware('verified');
