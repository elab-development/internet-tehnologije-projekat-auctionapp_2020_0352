<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {
        $userPurchases=auth()->user()->purchases()->get();
        return response()->json($userPurchases);
    }
}
