<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    protected $fillable = [
        'auction_id',
        'owner_id',
        'product_name',
        'buyer_id',
        'price',
    ];

    public function userOwner(){
        return $this->belongsTo(User::class);
    }
}
