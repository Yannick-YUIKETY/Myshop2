<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index($categorie = 0) // permet de lister les produits et les catégories puis les filtrer par categorie
    {

        $products = Product::orderBy('created_at','desc')->paginate(10) ; //liste de mes produits
        if ($categorie != 0) {
            $products = Product::where('categorie_id',$categorie)->orderBy('created_at','desc')->paginate(10) ;
        }
        $categories = Categorie::orderBy('name','desc')->get() ; // liste de mes catégories

        return view('welcome',compact('products' , 'categories')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail(Product $product) // permet d'afficher le detail du produit mais aussi les produits similaires

    {   $categories = Categorie::all() ;
        $products = Product::where('categorie_id' , $product->categorie_id)->orderBy('created_at','desc')->inRandomOrder()->limit(4)->get() ;
        return view ('detail',compact('product','products','categories')) ;
    }




}
