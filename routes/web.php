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


//---------------Start - Forms---------------//

//Activity Proposal
Route::get('/activityProposal', [App\Http\Controllers\HomeController::class, 'activityProposal'])->name('activityProposal');
Route::post('/activityProposalAdd', [App\Http\Controllers\FormValidationController::class, 'activityProposalAdd'])->name('activityProposalAdd');

//Requisition
Route::get('/requisition', [App\Http\Controllers\HomeController::class, 'requisition'])->name('requisition');
Route::post('/requisitionAdd', [App\Http\Controllers\FormValidationController::class, 'requisitionAdd'])->name('requisitionAdd');

//Narrative
Route::get('/narrative', [App\Http\Controllers\HomeController::class, 'narrative'])->name('narrative');
Route::post('/narrativeAdd', [App\Http\Controllers\FormValidationController::class, 'narrativeAdd'])->name('narrativeAdd');

//Liquidation
Route::get('/liquidation', [App\Http\Controllers\HomeController::class, 'liquidation'])->name('liquidation');
Route::post('/liquidationAdd', [App\Http\Controllers\FormValidationController::class, 'liquidationAdd'])->name('liquidationAdd');


//---------------End - Forms---------------//

//Submitted Forms
Route::get('/submittedForms', [App\Http\Controllers\SubmittedFormsController::class, 'index'])->name('submittedForms');



//Roles
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');

//Applicants
Route::get('/applicants', [App\Http\Controllers\HomeController::class, 'applicants'])->name('applicants');

//Applications
Route::get('/applications', [App\Http\Controllers\HomeController::class, 'applications'])->name('applications');



//---------------Start - Submitted Forms---------------//

//APF
Route::get('/submittedForms/details/{formId}/si/Kenneth/Lang/Pogi/Sa/bHuOnG/w0rlD', [App\Http\Controllers\SubmittedFormsController::class,'show'])->name('apf');   


//Forms Approve and Deny
Route::get('/submittedForms/details/{formId}/approve', [App\Http\Controllers\SubmittedFormsController::class,'approve'])->name('approve');

Route::get('/submittedForms/details/{formId}/deny', [App\Http\Controllers\SubmittedFormsController::class,'deny'])->name('deny');


//---------------End - Submitted Forms---------------//




//---------------Start - Generate Forms---------------//

//Records
Route::get('/records', [App\Http\Controllers\RecordsController::class, 'index'])->name('records');

//Generate Forms
Route::get('/records/downloadForm/{formId}', [App\Http\Controllers\RecordsController::class, 'downloadForm'])->name('downloadForm');


//---------------End - Generate Forms---------------//