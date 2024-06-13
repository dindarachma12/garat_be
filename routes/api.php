<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PolisiController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// use Illuminate\Http\Request;
 
// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
 
//     return ['token' => $token->plainTextToken];
// });

// Route::middleware("auth:sanctum")->group(function () {

// });

Route::post('/user/login', [AuthController::class,'login'])->name('login');


//user
Route::get('/users', [UserController::class,'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class,'update']);
Route::delete('/users/{id}', [UserController::class,'destroy']);

//bengkel motor
use App\Http\Controllers\BengkelMotorController;
Route::apiResource('/bengkel_motors', BengkelMotorController::class);
Route::get('/bengkel_motors', [BengkelMotorController::class,'index']);
Route::get('/bengkel_motors/{id}', [BengkelMotorController::class, 'show']);

//bengkel mobil
use App\Http\Controllers\BengkelMobilController;
Route::apiResource('/bengkel_mobils', BengkelMobilController::class);
Route::get('/bengkel_mobils', [BengkelMobilController::class, 'index']);
Route::get('/bengkel_mobils/{id}', [BengkelMobilController::class,'show']);

//towing
use App\Http\Controllers\TowingController;
Route::apiResource('/towings', TowingController::class);
Route::get('/towings', [TowingController::class, 'index']);
Route::get('/towings/{id}', [TowingController::class,'show']);

//tambal ban
use App\Http\Controllers\TambalBanController;
Route::get('/tambal_bans', [TambalBanController::class]);
Route::get('/tambal_bans', [TambalBanController::class, 'index']);
Route::get('/tambal_bans/{id}', [TambalBanController::class, 'show']);

//tips and tricks
use App\Http\Controllers\TipsTrickController;
Route::get('/tips_tricks', [TipsTrickController::class]);
Route::get('/tips_tricks', [TipsTrickController::class, 'index']);
Route::get('/tips_tricks/{id}', [TipsTrickController::class, 'show']);

//polisi

Route::get('/polisis', [PolisiController::class,'index']);
Route::post('/polisis', [PolisiController::class, 'store']);
Route::get('/polisis/{id}', [PolisiController::class, 'show']);
Route::get('/polisiUser/{id_user}', [PolisiController::class, 'getByUserId']);
Route::put('/polisis/{id}', [PolisiController::class,'update']);
Route::delete('/polisis/{id}', [PolisiController::class,'destroy']);

