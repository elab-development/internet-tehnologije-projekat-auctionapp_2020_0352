<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Auction extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'product_name',
        'category_id',
        'description',
        'start_price',
        'current_price'
    ];

    public function userOwner(){
        return $this->belongsTo(User::class);
    }
    public function highestBidder(){
        return $this->belongsTo(User::class,'user_id','current_bidder');
    }
    public function category(){
        return this->belongsTo(Category::class,'category_id');
    }
    public function getIsActiveAttribute(){
        $currentTime = Carbon::now();
        $endTime = Carbon::parse($this->end);
    
        return $currentTime->lte($endTime);   
    }
}
