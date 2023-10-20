<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DpfpApi\UserRestApiController;
use App\Http\Controllers\DpfpApi\TempFingerprintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Ruta Home del paquete 
Route::get('/home_dpfp', function () {
    return view('dpfp_views/home_dpfp');
});
//Rutas para interactuar con el plugin
Route::get('/users/verify-users', [UserRestApiController::class, 'verify_users'])->name('verify-users');
Route::get('/users', [UserRestApiController::class, 'users_list'])->name('users_list');
Route::get("/users/{user}/finger-list", [UserRestApiController::class, "fingerList"])->name("finger-list");
Route::post('/active_sensor_read', [TempFingerprintController::class, 'store_read']);
Route::post('/active_sensor_enroll', [TempFingerprintController::class, 'store_enroll']);
Route::get("/get-finger/{user}", [UserRestApiController::class, "get_finger"])->name("get_finger");