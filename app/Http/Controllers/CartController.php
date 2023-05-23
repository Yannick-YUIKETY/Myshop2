<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Categorie;
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
        $categories = Categorie::all() ;
        $products = Product::all() ;

        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $somme = 0 ;
        $sommeProduct= 0 ;



        foreach ($carts as $itemCart) {

            $somme = ($itemCart->quantite * $itemCart->price) + $somme ;

        }




        return view('cart',compact('carts','somme','categories','products')) ;
    }

     /**
     * Ajouter au caddie
     * Verifier l'existence du produit
     * Mettre à jour les quantité
     */
    public function add(Product $product)
    {
        //incrementation de la quantité

        $quantite = 1 ;

        if(isset($_GET['quantity'])){        /*si Get quantité est déclaré dans l'url alors quantité inséré en base prend sa valeur */
            $quantite = $_GET['quantity'] ;
        } ;




        //on verifie l'existence du produit dans le panier
        //Select * from Cart where user_id = ? AND product_id = $product->id->limit(0,1)

        $cart = Cart::where('user_id',Auth::user()->id)
                    ->where('product_id',$product->id)
                    ->first();

        //penser a controller l'existence du produit
        if(isset($cart)){
        //
        Cart::where('id',$cart->id)
        ->update([
            "quantite"=> $quantite,
        ]);

    }else{
        Cart::create([
            "user_id"=>Auth::user()->id,
            "product_id"=>$product->id,
            "quantite"=>$quantite,
            "price"=>$product->price,

        ]);
    }
    return redirect()->back() ;

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
