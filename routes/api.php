<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAuctionController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::resource('categories',CategoryController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users/{id}/auctions',[UserAuctionController::class,'index'])->name('users.auctions.index');
Route::get('/allAuctions',[AuctionController::class,'indexAll']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('auctions', AuctionController::class)->only(['update','store','destroy']);
    Route::resource('/myauctions',AuctionController::class);
    Route::post('/increase-balance', [UserController::class, 'increaseBalance']);
    Route::post('/auctions/bid', [BidController::class, 'placeBid']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
