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

# Categories list view
Route::get('/',[\App\Http\Controllers\CategoryController::class,'index']);
# Categories table view
Route::get('/tableView',[\App\Http\Controllers\CategoryController::class,'tableView']);
