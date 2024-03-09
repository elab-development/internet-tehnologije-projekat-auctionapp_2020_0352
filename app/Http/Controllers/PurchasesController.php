<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function indexSuccessful()
    {
        $userPurchases = auth()->user()->purchases()->whereNotNull('buyer_id')->get();
        return response()->json($userPurchases);
    }

    public function indexUnsuccessful()
    {
        $userPurchases = auth()->user()->purchases()->whereNull('buyer_id')->get();
        return response()->json($userPurchases);
    }
}
