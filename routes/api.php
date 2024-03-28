<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KantorController;

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

// Authentication route
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pegawai', [AuthController::class, 'getByNIP']);
Route::get('/image-url/{imageName}', [ImageController::class, 'getImageUrl']);


// Resourceful route for presences
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/presences', PresenceController::class);
    Route::post('/post', [PresenceController::class, 'store']);
    Route::get('/presences/{id}', [PresenceController::class, 'show']);
    Route::get('/kantor', [KantorController::class, 'index']);
});