<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::resource('jurusans', JurusanController::class)->middleware('auth:sanctum');
// Route::resource('matakuliah', MataKuliahController::class)->middleware('auth:sanctum');
Route::get('matakuliah', [MataKuliahController::class, 'index']);
Route::get('matakuliah/informatika', [MataKuliahController::class, 'informatika']);
Route::get('matakuliah/semester/{semester}', [MataKuliahController::class, 'semester']);
Route::get('matakuliah/teori_or_praktikum/{type?}', [MataKuliahController::class, 'teori_or_praktikum']);


// any


Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('user', [AuthController::class, 'user']);
