<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auction;

class UserAuctionController extends Controller
{
    public function index($user_id){
        $auctions=Auction::get()->where('user_id',$user_id);
        if(is_null($auctions)){
            return response()->json('This user doesnt have any auctions at the moment');
        }
        return response()->json($auctions);
    }
}
