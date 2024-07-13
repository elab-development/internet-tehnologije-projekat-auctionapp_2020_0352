<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAuctionController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\PurchasesController;



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
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/categories/{category_id}/auctions', [AuctionController::class, 'indexByCategory']);
    Route::get('/auction/{id}', [AuctionController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users/{id}/auctions',[UserAuctionController::class,'index'])->name('users.auctions.index');
Route::get('/allAuctionsUnprotected', [AuctionController::class, 'inde  xAll']);
Route::delete('/delete-auction/{id}', [AuctionController::class, 'destroyById']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::get('/boughtAuctions',[PurchasesController::class,'indexBought']);
    Route::get('/purchasesSuccessful', [PurchasesController::class,'indexSuccessful']);
    Route::get('/purchasesUnsuccessful', [PurchasesController::class,'indexUnsuccessful']);
    Route::get('/allAuctions', [AuctionController::class, 'indexFiltered']);
    Route::put('/profile', [UserController::class, 'updateProfile']);
    Route::resource('auctions', AuctionController::class)->only(['update','store','destroy']);
    Route::resource('/myauctions',AuctionController::class);
    Route::post('/increase-balance', [UserController::class, 'increaseBalance']);
    Route::post('/auctions/bid', [BidController::class, 'placeBid']);
    Route::post('/logout', [AuthController::class, 'logout']);
});