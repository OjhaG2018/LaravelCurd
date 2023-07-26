<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use GuzzleHttp\Middleware;

// use App\Http\Controllers\userController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'employee'], function () {
//     Route::get('/',[EmployeeController::class, 'index']);
//     Route::get('/add',[EmployeeController::class, 'add']);
// });

 
Route::resource('employee', EmployeeController::class)->middleware('auth');