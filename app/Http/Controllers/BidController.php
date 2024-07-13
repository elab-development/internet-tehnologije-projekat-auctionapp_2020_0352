<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProcessBid;

class BidController extends Controller
{
    public function placeBid(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'auction_id' => 'required|exists:auctions,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $auctionId = $request->auction_id;
        $auction = Auction::find($auctionId);
        $user = Auth::user();
        if ($auction->is_locked || $user->is_locked) {
            return response()->json(['message' => 'Auction is locked.'], 401);
        }
        if (!$user) {
            return response()->json(['message' => 'You have to be logged in to make a bid.'], 401);
        }
        if ($auction->user_id === $user->id) {
            return response()->json(['message' => 'You cannot bid on your own auction.'], 400);
        }
        if ($auction->current_bidder === $user->id) {
            return response()->json(['message' => 'You are already the highest bidder.'], 400);
        }
        $bidAmount = max($auction->current_price, $auction->start_price);
        if ($user->balance < $bidAmount) {
            return response()->json(['message' => 'You don\'t have enough funds in your account'], 400);
        }
        ProcessBid::dispatch($auctionId, $user->id, $bidAmount);
        return response()->json(['message' => 'Bid made successfully','new_balance'=>$user->balance]);
    }
}
