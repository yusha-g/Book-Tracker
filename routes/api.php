<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

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

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout']);

Route::middleware('auth:sanctum')->group(function () {

    //get user information
    Route::get('/user', function(Request $req){
        $user = $req->user();
        $auth_user = Auth::user();
        return response()->json([
            $user,
            $auth_user
        ]);
    });

});

/** BOOK CRUD OPERATIONS
 * Create - post
 * Read - get
 * Update - put
 * Delete - delete
 */

Route::middleware('auth:sanctum')->prefix('book')->group(function(){
    Route::post('/',[BookController::class, 'create']); //add new book
    Route::get('/',[BookController::class, 'read']);    //list all books
    Route::put('/{id}',[BookController::class, 'update']);  //update book by id
    Route::delete('/{id}',[BookController::class, 'delete']);   //delete book by id
    
});