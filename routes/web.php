<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyTableController;

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

Route::get('/', [MyTableController::class, 'index']);
Route::get('/titik/lokasi/{id}', [MyTableController::class, 'lokasi']);
Route::get('/titik/json', [MyTableController::class, 'titik']);
