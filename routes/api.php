<?php

use App\Http\Controllers\CamatController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PropinsiController;
use App\Http\Controllers\WilayahController;
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

//penduduk
Route::get('penduduk',[PendudukController::class,'index']);

Route::post('penduduk/create',[PendudukController::class,'store']);

Route::get('penduduk/show/{nik}',[PendudukController::class,'show']);

Route::post('penduduk/update/{nik}',[PendudukController::class,'update']);

Route::get('penduduk/destroy/{nik}', [PendudukController::class, 'destroy']);

//propinsi
Route::get('propinsi',[PropinsiController::class,'index']);

Route::post('propinsi/create',[PropinsiController::class,'store']);

Route::get('propinsi/show/{kdPropinsi}',[PropinsiController::class,'show']);


Route::post('propinsi/update/{kdPropinsi}',[PropinsiController::class,'update']);


Route::get('propinsi/destroy/{kdPropinsi}', [PropinsiController::class, 'destroy']);

//Wilayah
Route::get('wilayah',[WilayahController::class,'index']);

Route::post('wilayah/create',[WilayahController::class,'store']);

Route::get('wilayah/show/{kdWilayah}',[WilayahController::class,'show']);

Route::post('wilayah/update/{kdWilayah}',[WilayahController::class,'update']);

Route::get('wilayah/destroy/{kdWilayah}', [WilayahController::class, 'destroy']);

//Camat
Route::get('camat',[CamatController::class,'index']);

Route::post('camat/create',[CamatController::class,'store']);

Route::get('camat/show/{kdCamat}',[CamatController::class,'show']);


Route::post('camat/update/{kdCamat}',[CamatController::class,'update']);

Route::get('camat/destroy/{kdCamat}', [CamatController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
