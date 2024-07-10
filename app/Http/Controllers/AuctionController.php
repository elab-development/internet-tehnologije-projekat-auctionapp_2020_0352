<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AuctionResource;
use App\Models\Purchases;
use App\Models\User;

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
        $auctions = Auction::all();
    return new AuctionResource($auctions);
    }
    public function indexFiltered()
    {
        // Dobijamo trenutno ulogovanog korisnika
        $user = auth()->user();

        // Dobijamo aukcije koje nije kreirao trenutno ulogovani korisnik
        $auctions = Auction::where('user_id', '!=', $user->id)->get();

        return new AuctionResource($auctions);
    }


    public function indexByCategory($category_id)
    {
        $auctions = Auction::where('category_id', $category_id)->get();
        return response()->json(['auctions' => $auctions]);
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
        else{
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

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $auction = Auction::find($id);

    if (!$auction) {
        return response()->json(['error' => 'Auction not found'], 404);
    }

    return new AuctionResource($auction);
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
    }

    $auction->user_id = $request->user_id;
    $auction->product_name = $request->product_name;
    $auction->category_id = $request->category_id;
    $auction->description = $request->description;
    $auction->start_price = $request->start_price;
    $auction->save();

    return response()->json('Auction updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();
        return response()->json('Post delete successfully');
    }


    public function destroyById($id)
    {
        $auction = Auction::find($id);

        if (!$auction) {
            return response()->json(['error' => 'Auction not found'], 404);
        }
        if($auction->current_price!=$auction->start_price){
            $sold_price=$auction->current_price/1.05;
        }
        else{
            $sold_price=0;
        }
        $user = User::find($auction->user_id);
        if ($user || $auction->current_price!=$auction->start_price) {
            $user->balance += $sold_price;
            $user->save();
        }

        Purchases::create([
            'owner_id' => $auction->user_id,
            'auction_id' => $auction->id,
            'product_name' => $auction->product_name,
            'buyer_id' => $auction->current_bidder,
            'price' => $sold_price,
        ]);

        $auction->delete();
        return response()->json('Auction deleted successfully.');
    }

}