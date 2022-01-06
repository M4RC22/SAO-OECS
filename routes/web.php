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

//Startup
Route::get('/', function () {
    return view('/auth/login');
});
Auth::routes();

//Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Forms
Route::get('/activityProposal', [App\Http\Controllers\HomeController::class, 'activityProposal'])->name('activityProposal');
Route::get('/requisition', [App\Http\Controllers\HomeController::class, 'requisition'])->name('requisition');
Route::get('/narrative', [App\Http\Controllers\HomeController::class, 'narrative'])->name('narrative');
Route::get('/liquidation', [App\Http\Controllers\HomeController::class, 'liquidation'])->name('liquidation');

//Submitted Forms
Route::get('/submittedForms', [App\Http\Controllers\HomeController::class, 'submittedForms'])->name('submittedForms');

//Records
Route::get('/records', [App\Http\Controllers\HomeController::class, 'records'])->name('records');

//Roles
Route::get('/roles', [App\Http\Controllers\HomeController::class, 'roles'])->name('roles');

//Applicants
Route::get('/applicants', [App\Http\Controllers\HomeController::class, 'applicants'])->name('applicants');


