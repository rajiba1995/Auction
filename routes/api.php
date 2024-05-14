<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{AuthController, InspectorController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('valid-mobile', [AuthController::class, 'ValidUserMobile']);
Route::post('login-with-otp', [AuthController::class, 'LogInWithOTP']);

Route::get('inspector/create/job', [InspectorController::class, 'CreateJob']);
Route::get('inspector/update/job/{id}', [InspectorController::class, 'UpdateJob']);
Route::post('inspector/update/job/store', [InspectorController::class, 'UpdateJobStore']);
Route::get('vendor/fetchdata/{id}', [InspectorController::class, 'VendorFetchData']);
Route::get('client-wise/grades/by-package/{clientid}/{packid}', [InspectorController::class, 'ClientWiseGradesByPackId']);
Route::get('inspector/pending/joblist/{id}', [InspectorController::class, 'PendingJobList']);
Route::get('inspector/completed/joblist/{id}', [InspectorController::class, 'CompletedJobList']);
Route::get('inspector/completed/jobreport/{id}', [InspectorController::class, 'CompletedJobReport']);
Route::get('inspector/pending/job/create/{id}', [InspectorController::class, 'PendingJobCreate']);
Route::post('inspector/pending/job/final-submit', [InspectorController::class, 'PendingJobFinalSubmit']);
Route::post('inspector/pending/job/store', [InspectorController::class, 'PendingJobStore']);
Route::post('inspector/job/value/update', [InspectorController::class, 'JobSingleValueUpdate']);
Route::post('inspector/job/value/tab-wise-update', [InspectorController::class, 'JobTabWiseValueUpdate']);
Route::post('inspector/new/job/store', [InspectorController::class, 'JobStore']);
Route::get('inspector/job/notifications/{id}', [InspectorController::class, 'InspectorNotificationList']);
Route::get('inspector/client/list', [InspectorController::class, 'AllClientList']);
Route::get('inspection-field/list/{clientid}/{packid}', [InspectorController::class, 'FieldCreate']);

Route::post('inspection-field/store', [InspectorController::class, 'FieldStore']);
Route::post('inspection-field/required-value/store', [InspectorController::class, 'FieldRequiredValueStore']);
Route::get('inspector/job/report/download/{id}', [InspectorController::class, 'ReportDownloadPDF']);
Route::post('inspector/field/grade/update', [InspectorController::class, 'GradeValueStore']);

// Vendor Module

Route::get('vendor/list/', [InspectorController::class, 'AllVendorList']);
Route::post('vendor/store', [InspectorController::class, 'VendorStore']);
Route::get('vendor/edit/{id}', [InspectorController::class, 'VendorEdit']);
Route::post('vendor/update', [InspectorController::class, 'VendorUpdate']);

