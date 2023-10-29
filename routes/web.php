<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index']);
Route::get('/form', [Controllers\FormController::class, 'show_form']);
Route::post('/form', [Controllers\FormController::class, 'process_form']);
Route::get('/data', [Controllers\DataController::class, 'show_data']);
