<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;




Route::post('/register', [ProfileController::class, 'register']);
Route::post('/token', [ProfileController::class, 'create_token']);

Route::middleware('auth:sanctum')->group(function () {

});


