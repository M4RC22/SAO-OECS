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
Route::get('/trackForm/{formId}', [App\Http\Controllers\HomeController::class, 'trackForm'])->name('trackForm');


//---------------Start - Forms---------------//

//Activity Proposal
Route::get('/activityProposal', [App\Http\Controllers\HomeController::class, 'activityProposal'])->name('activityProposal');
Route::post('/activityProposalAdd', [App\Http\Controllers\FormValidationController::class, 'activityProposalAdd'])->name('activityProposalAdd');
Route::get('/APF/{formId}/edit', [App\Http\Controllers\EditFormController::class, 'apfEdit'])->name('apfEdit');
Route::post('/APFUpdate/{formId}', [App\Http\Controllers\EditFormController::class, 'apfUpdate'])->name('apfUpdate');

//Requisition
Route::get('/requisition', [App\Http\Controllers\HomeController::class, 'requisition'])->name('requisition');
Route::post('/requisitionAdd', [App\Http\Controllers\FormValidationController::class, 'requisitionAdd'])->name('requisitionAdd');
Route::get('/Requisition/{formId}/edit', [App\Http\Controllers\EditFormController::class, 'requisitionEdit'])->name('requisitionEdit');
Route::post('/RequisitionUpdate/{formId}', [App\Http\Controllers\EditFormController::class, 'requisitionUpdate'])->name('requisitionUpdate');

//Narrative
Route::get('/narrative', [App\Http\Controllers\HomeController::class, 'narrative'])->name('narrative');
Route::post('/narrativeAdd', [App\Http\Controllers\FormValidationController::class, 'narrativeAdd'])->name('narrativeAdd');
Route::get('/Narrative/{formId}/edit', [App\Http\Controllers\EditFormController::class, 'narrativeEdit'])->name('narrativeEdit');
Route::post('/NarrativeUpdate/{formId}', [App\Http\Controllers\EditFormController::class, 'narrativeUpdate'])->name('narrativeUpdate');

//Liquidation
Route::get('/liquidation', [App\Http\Controllers\HomeController::class, 'liquidation'])->name('liquidation');
Route::post('/liquidationAdd', [App\Http\Controllers\FormValidationController::class, 'liquidationAdd'])->name('liquidationAdd');
Route::get('/Liquidation/{formId}/edit', [App\Http\Controllers\EditFormController::class, 'liquidationEdit'])->name('liquidationEdit');
Route::post('/LiquidationUpdate/{formId}', [App\Http\Controllers\EditFormController::class, 'liquidationUpdate'])->name('liquidationUpdate');


//---------------End - Forms---------------//


//---------------Start - Roles---------------//

Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
Route::post('/assignPosition', [App\Http\Controllers\RolesController::class, 'assignPosition'])->name('assignPosition');
Route::get('/removeMember/{id}', [App\Http\Controllers\RolesController::class, 'removeMember'])->name('removeMember');

//---------------End - Roles---------------//

//---------------Start - OrgCreation---------------//

//Applicants
Route::get('/applicants', [App\Http\Controllers\OrgCreationController::class, 'applicants'])->name('applicants');

//Applications
Route::post('/apply/{userId}', [App\Http\Controllers\OrgCreationController::class, 'apply'])->name('apply');
Route::get('/application/viewDetails/{applicationId}', [App\Http\Controllers\OrgCreationController::class, 'viewDetails'])->name('viewDetails');
Route::get('/application/approve/{applicationId}', [App\Http\Controllers\OrgCreationController::class, 'approve'])->name('approve');
Route::get('/application/deny/{applicationId}', [App\Http\Controllers\OrgCreationController::class, 'deny'])->name('deny');


//---------------Start - OrgCreation---------------//


//---------------Start - Submitted Forms---------------//

Route::get('/submittedForms', [App\Http\Controllers\SubmittedFormsController::class, 'index'])->name('submittedForms');
Route::get('/submittedForms/details/{formId}', [App\Http\Controllers\SubmittedFormsController::class,'show'])->name('apf');   
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



//---------------Start - Charts---------------//




