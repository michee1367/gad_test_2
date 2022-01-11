<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AuthController;
use App\Models\Utilisateur;
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
//Route::resource('utilisateurs', Utilisateur::class);
//Route::get('/utilisateurs/search{name}',[UtilisateurController::class,'search']);


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/utilisateurs',[UtilisateurController::class,'index']);
Route::get('/utilisateurs/{id}',[UtilisateurController::class,'show']);
Route::get('/utilisateurs/search{name}',[UtilisateurController::class,'search']);


Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/utilisateurs',[UtilisateurController::class,'store']);
    Route::put('/utilisateurs/{id}',[UtilisateurController::class,'update']);
    Route::delete('/utilisateurs/{id}',[UtilisateurController::class,'delete']);
    Route::post('/logout',[AuthController::class,'logout']);
});




//Route::post('/utilisateurs',function(){
  //  
//});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
