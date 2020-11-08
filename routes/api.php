<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
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
Route::get('/index',function(){
    $test ="helo word";
    return $test;
});
//Route::resource('user', UserController::class);
Route::get('user/list',[UserController::class, 'index']);
Route::post('user/store',[UserController::class,'store']);
Route::put('user/{id}/update',[UserController::class,'update']);
Route::delete('user/{id}/destroy',[UserController::class,'destroy']);
//rotas para anuncios
Route::post('advert/{id}/store',[AdvertController::class,'store']);
Route::get('advert/list',[AdvertController::class,'index']);
