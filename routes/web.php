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


//---------------Start Forms---------------//

//Activity Proposal
Route::get('/activityProposal', [App\Http\Controllers\HomeController::class, 'activityProposal'])->name('activityProposal');
Route::post('/activityProposalAdd', [App\Http\Controllers\HomeController::class, 'activityProposalAdd'])->name('activityProposalAdd');

//Requisition
Route::get('/requisition', [App\Http\Controllers\HomeController::class, 'requisition'])->name('requisition');
Route::post('/requisitionAdd', [App\Http\Controllers\HomeController::class, 'requisitionAdd'])->name('requisitionAdd');

//Narrative
Route::get('/narrative', [App\Http\Controllers\HomeController::class, 'narrative'])->name('narrative');
Route::post('/narrativeAdd', [App\Http\Controllers\HomeController::class, 'narrativeAdd'])->name('narrativeAdd');

//Liquidation
Route::get('/liquidation', [App\Http\Controllers\HomeController::class, 'liquidation'])->name('liquidation');
Route::post('/liquidationAdd', [App\Http\Controllers\HomeController::class, 'liquidationAdd'])->name('liquidationAdd');


//---------------End Forms---------------//

//Submitted Forms
Route::get('/submittedForms', [App\Http\Controllers\SubmittedFormsController::class, 'index'])->name('submittedForms');

//Records
Route::get('/records', [App\Http\Controllers\HomeController::class, 'records'])->name('records');

//Roles
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');

//Applicants
Route::get('/applicants', [App\Http\Controllers\HomeController::class, 'applicants'])->name('applicants');

//Applications
Route::get('/applications', [App\Http\Controllers\HomeController::class, 'applications'])->name('applications');



//Forms Controllers

//APF
Route::get('/submittedForms/details/{formId}/si/Kenneth/Lang/Pogi/Sa/bHuOnG/w0rlD', [App\Http\Controllers\SubmittedFormsController::class,'show'])->name('apf');   

Route::get('/submittedForms/details/{formId}', [App\Http\Controllers\SubmittedFormsController::class,'approve'])->name('approve');


