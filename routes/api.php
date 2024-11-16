<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    new User();
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::resource('users', UserController::class)->except(['create', 'edit']);

Route::get('alejo', UserController::class.'@alejo');