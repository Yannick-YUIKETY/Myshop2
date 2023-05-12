<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        return view('cart',compact('carts')) ;
    }

     /**
     * Ajouter au caddie
     * Verifier l'existence du produit
     * Mettre à jour les quantité
     */
    public function add(Product $product)
    {
        //on verifie l'existence du produit dans le panier
        //Select * from Cart where user_id = ? AND product_id = $product->id->limit(0,1)

        $cart = Cart::where('user_id',Auth::user()->id)
                    ->where('product_id',$product->id)
                    ->first();

        //penser a controller l'existence du produit
        if(isset($cart)){
        //
        Cart::where('id',$cart->id)->update([
            "quantite"=>$cart->quantite+1,
        ]);

    }else{
        Cart::create([
            "user_id"=>Auth::user()->id,
            "product_id"=>$product->id,
            "quantite"=>1,
            "price"=>$product->price,

        ]);
    }
    return redirect(route('cart')) ;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
