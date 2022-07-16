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

Route::match(['get', 'post'], '/asset/addNew', [AssetController::class, 'addNew']);

Route::match(['get', 'post'], '/location/{id}', [LocationController::class, 'one'])->where('id', '[0-9]+');

Route::match(['get', 'post'], '/location/edit', [LocationController::class, 'edit']);

Route::match(['get', 'post'], '/location/addNew', [LocationController::class, 'addNew']);

Route::match(['get', 'post'], '/movement/{id}', [MovementController::class, 'one'])->where('id', '[0-9]+');

Route::match(['get', 'post'], '/movement/edit', [MovementController::class, 'edit']);

Route::match(['get', 'post'], '/movement/addNew', [MovementController::class, 'addNew']);

Route::match(['get', 'post'], '/user/{id}', [UserController::class, 'one'])->where('id', '[0-9]+');

Route::match(['get', 'post'], '/user/edit', [UserController::class, 'edit']);

Route::match(['get', 'post'], '/user/addNew', [UserController::class, 'addNew']);
