<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Auction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProcessBid implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $auctionId;
    protected $userId;
    protected $bidAmount;

    public function __construct($auctionId, $userId, $bidAmount)
    {
        $this->auctionId = $auctionId;
        $this->userId = $userId;
        $this->bidAmount = $bidAmount;
    }
    public function handle(): void
    {
        \DB::transaction(function () {
        $auction = Auction::lockForUpdate()->find($this->auctionId);
        $user = User::lockForUpdate()->find($this->userId);
        if (!$user || !$auction) {
            return;
        }
        $userBefore = User::find($auction->current_bidder);
        if ($auction->user_id === $user->id || $auction->current_bidder === $user->id || $user->balance < $this->bidAmount) {
            return;
            }
        if($userBefore){
            $userBefore->balance+=($this->bidAmount/1.05);
            $userBefore->save();
        }
        $auction->current_price = $this->bidAmount * 1.05;
        $auction->current_bidder = $user->id;
        $auction->save();
        $user->balance -= $this->bidAmount;
        $user->save();
    });
    }
}