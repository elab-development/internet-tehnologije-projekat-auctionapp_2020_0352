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
        $expiredAuctions = Auction::whereDate('end', '<=', now()->toDateString())->get();

        foreach ($expiredAuctions as $auction) {
            Purchases::create([
                'auction_id' => $auction->id,
                'user_id' => $auction->current_bidder,
                'price' => $auction->current_price*0.95,
            ]);

            $auction->delete();
        }
    }
}
