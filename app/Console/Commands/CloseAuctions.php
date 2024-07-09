<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\Purchases;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CloseAuctions extends Command
{
    protected $signature = 'auctions:close';
    protected $description = 'Close expired auctions and move them to purchases.';

    public function handle()
    {
        $expiredAuctions =DB::table('auctions')->where('end', '<', Carbon::now())->get();

        foreach ($expiredAuctions as $auction) {
            DB::table('purchases')->insert([
                'owner_id'=>$auction->user_id,
                'auction_id' => $auction->id,
                'buyer_id' => $auction->current_bidder,
                'product_name'=>$auction->product_name,
                'price' => $auction->current_price/1.05,
            ]);
            DB::table('auctions')->where('id', $auction->id)->delete();
        }
        $this->info('Expired auctions closed and moved to purchases.');
    }
}
