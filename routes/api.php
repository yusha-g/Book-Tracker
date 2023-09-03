<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** BOOK CRUD OPERATIONS
 * Create - post
 * Read - get
 * Update - put
 * Delete - delete
 */

Route::middleware([])->prefix('book')->group(function(){
    Route::post('/',[BookController::class, 'create']); //add new book
    Route::get('/',[BookController::class, 'read']);    //list all books
    Route::put('/{id}',[BookController::class, 'update']);  //update book by id
    Route::delete('/{id}',[BookController::class, 'delete']);   //delete book by id
    
});