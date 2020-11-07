<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
