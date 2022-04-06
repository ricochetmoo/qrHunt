<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TeamController;

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

Route::get('/', function() {return view('team.choose')->with('teams', TeamController::index());});

Route::get('/team/{id}', [TeamController::class, 'choose']);
Route::get('/scan/{code}', [LocationController::class, 'scan']);
Route::get('/scanner', function() {return view('scanner');});

Route::get('/admin/team', function() {return view('team.create')->with('locations', LocationController::index());});
Route::post('/admin/team', [TeamController::class, 'create']);

Route::get('/admin/location', function() {return view('location.create');});
Route::post('/admin/location', [LocationController::class, 'create']);