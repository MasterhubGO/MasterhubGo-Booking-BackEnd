<?php

use App\Http\Controllers\BusinessService\BusinessServiceController;
use App\Http\Controllers\BusinessService\BusinessServicesQuestionController;
use \App\Http\Controllers\Cabinets\BusinessController;
use \App\Http\Controllers\Cabinets\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Support\CurrencyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/personal-cabinet', UserController::class)->except(['store']);

    Route::apiResource('/business-profiles', BusinessController::class)->except(['edit', 'create']);
	Route::apiResource('/business-profiles.services', BusinessServiceController::class)->shallow();

	Route::get('services', [BusinessServiceController::class, 'list']);
	Route::apiResource('services.questions', BusinessServicesQuestionController::class)->shallow();
	
	Route::apiResource('/currencies', CurrencyController::class);

	Route::apiResource('business-profiles.comments', CommentController::class)->shallow();
});


Route::post('/sendimage', [ImageController::class, 'store'])->name('image.store');

Route::get('profile/{user}', [ProfileController::class, 'trackVisit'])->name('profile.visit');
