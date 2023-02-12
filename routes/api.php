<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FieldTypeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/form', [FormController::class, 'listForms']);
Route::get('/form/{id}', [FormController::class, 'show']);
Route::post('/form', [FormController::class, 'store']);
Route::put('/form', [FormController::class, 'update']);
Route::delete('/form/{id}', [FormController::class, 'delete']);

Route::get('/field-type', [FieldTypeController::class, 'listFieldTypes']);
