<?php

use App\Http\Controllers\JadwalController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_aktivitas', [JadwalController::class, 'get'])->name('getAktivitas');
Route::get('get_aktivitas/find/{id}', [JadwalController::class, 'find'])->name('findAktivitas');
Route::post('get_aktivitas/create', [JadwalController::class, 'create'])->name('createAktivitas');
Route::put('get_aktivitas/edit', [JadwalController::class, 'edit'])->name('editAktivitas');
Route::delete('get_aktivitas/delete', [JadwalController::class, 'delete'])->name('deleteAktivitas');
Route::put('get_aktivitas/set-status', [JadwalController::class, 'setStatus'])->name('setStatus');
