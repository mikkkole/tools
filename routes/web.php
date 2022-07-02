<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\AdministrationController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AssetController::class, 'show']);

Route::get('/locations', [LocationController::class, 'show']);

Route::get('/workers', [UserController::class, 'show']);

Route::get('/movements', [MovementController::class, 'show']);

Route::get('/administration', [AdministrationController::class, 'show']);

Route::match(['get', 'post'], '/administration/{categoryName}', [AdministrationController::class, 'one']);

Route::match(['get', 'post'], '/asset/{id}', [AssetController::class, 'one'])->where('id', '[0-9]+');

Route::match(['get', 'post'], '/asset/edit', [AssetController::class, 'edit']);

Route::get('/location/{id}', [LocationController::class, 'one'])->where('id', '[0-9]+');

Route::get('/movement/{id}', [MovementController::class, 'one'])->where('id', '[0-9]+');

Route::get('/user/{id}', [UserController::class, 'one'])->where('id', '[0-9]+');
