<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\Purchases;

class CloseAuctions extends Command
{
    protected $signature = 'auctions:close';
    protected $description = 'Close expired auctions and move them to purchases.';

    public function handle()
    {
        $expiredAuctions = Auction::whereRaw('end <= NOW()')->get();


        foreach ($expiredAuctions as $auction) {
            if($auction->current_bidder){
                Purchases::create([
                    'auction_id' => $auction->id,
                    'user_id' => $auction->current_bidder,
                    'product_name'=>$auction->product_name,
                    'price' => $auction->current_price/1.05,
                ]);
            }
            $auction->delete();
        }
    }
}
