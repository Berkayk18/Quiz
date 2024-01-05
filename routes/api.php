<?php

use App\Http\Controllers\Questionnaires\AuthController;
use App\Http\Controllers\Questionnaires\QuestionnaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//        return $request->user();
});

Route::group(['prefix' => 'questionnaires/{uuid}', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [QuestionnaireController::class, 'getQuestionnaires'])->name('api.questions.get');
    Route::post('', [QuestionnaireController::class, 'submitQuestionnaires'])->name('api.result.post');
});

//Route::get('results', [QuestionnaireController::class, 'getResults'])->name('api.result.get');
Route::get('results', [QuestionnaireController::class, 'getResults'])->name('api.result.get')->middleware('auth:sanctum');


Route::group(['prefix' => 'auth'], function() {
    Route::post('register', [AuthController::class, 'createUser']);
    Route::post('login', [AuthController::class, 'loginUser']);
});
