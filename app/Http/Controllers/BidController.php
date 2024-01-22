<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;
use App\Models\User;

class BidController extends Controller
{
    public function placeBid(Request $request)
    {
        $request->validate([
            'auction_id' => 'required|exists:auctions,id',
        ]);

        $auctionId = $request->auction_id;

        // Pronalaženje aukcije
        $auction = Auction::find($auctionId);

        if (!$auction) {
            return response()->json(['message' => 'Auction not found.'], 404);
        }
       
        if (!$auction->getIsActiveAttribute()) {
            return response()->json(['message' => 'Auction not active'], 400);
        }
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'You have to be loged in to make a bid.'], 401);
        }
       /*if ($auction->user_id === $user->id) {
            return response()->json(['message' => 'You cannot bid on your own auction.'], 400);
        }
        if ($auction->current_bidder === $user->id) {
            return response()->json(['message' => 'You are already the highest bidder.'], 400);
        }*/
        if($auction->current_price>$auction->start_price){
            $bidAmount=$auction->current_price;
        }
        else{
            $bidAmount=$auction->start_price;
        }
        if ($user->balance < $bidAmount) {
            return response()->json(['message' => 'You dont have enough funds in your account'], 400);
        }
        $auction->current_price = $bidAmount*1.05;
        $auction->current_bidder = $user->id;
        $auction->save();
        $user->balance -= $bidAmount;
        $user->save();


        return response()->json(['message' => 'Bid made successfully','new_balance' => $user->balance]);
    }
    
}
