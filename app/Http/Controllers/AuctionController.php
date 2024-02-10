<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AuctionResource;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAuctions = auth()->user()->auctions()->get();
        return response()->json($userAuctions);
    }
    public function indexAll()
    {
        $auctions=Auction::all();
       return new AuctionResource($auctions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|string|max:100',
            'category_id'=>'required',
            'description'=>'required|string|max:255',
            'image_path'=>'string|max:255',
            'start_price'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $auction=Auction::create([
            'user_id'=> auth()->user()->id,
            'product_name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'start_price'=>$request->start_price,
            'current_price'=>$request->start_price,
            'image_path'=>$request->image_path,
            'start'=>now(),
            'end'=>now()->addDays(3)
        ]);
        return response()->json('Auction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auction $auction)
    {
        $validator=Validator::make($request->all(),[
            'user_id'=>'required',
            'product_name'=>'required|string|max:100',
            'category_id'=>'required',
            'description'=>'required|string|max:255',
            'start_price'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
            $auction->user_id=$request->user_id;
            $auction->product_name=$request->product_name;
            $auction->category_id=$request->category_id;
            $auction->description=$request->description;
            $auction->start_price=$request->start_price;
            $auction->save();
            return response()->json('Post updated successfully.');
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();
        return response()->json('Post delete successfully');
    }
}
