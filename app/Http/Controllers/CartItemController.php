<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
    public function index()
    {

        $products = DB::table('cart_items')
            ->join('products', function ($join) {
                $join->on('cart_items.ProductID', '=', 'products.ProductID');
            })->where('UserID', Auth::user()->id)
            ->get();

        foreach($products as $product){

            $product->ProductImage = str_replace("products\July2018","storage/products/july2018",$product->ProductImage);
            $filename = $product->ProductImage;
            $filename = (file_get_contents($filename));
            $product->ProductImage = base64_encode($filename);
            //$image = Array('image'=>json_encode(base64_encode($filename)));


        }
        return $products;
        //return $cart;
    }

    public function show(CartItems $cartitem)
    {
        return $cartitem;
    }

    public function store(Request $request)
    {
        $result = DB::table('cart_items')
            ->where('UserID', '=', Auth::user()->id)
            ->where('ProductID', '=', $request->ProductID)
            ->exists();

        if ($result){
           DB::table('cart_items')
                ->where('UserID', '=', Auth::user()->id)
                ->where('ProductID', '=', $request->ProductID)
                ->increment('quantity');

            $cartitem = DB::table('cart_items')
                ->where('UserID', '=', Auth::user()->id)
                ->where('ProductID', '=', $request->ProductID)->get();
            return response()->json($cartitem, 201);
        }
        else{
         $cartitem = CartItems::create($request->all());
            return response()->json($cartitem, 201);
        }

    }

    public function update(Request $request, CartItems $cartitem)
    {
        $cartitem->update($request->all());

        return response()->json($cartitem, 200);
    }

    public function delete(CartItems $cartitem)
    {
        $cartitem->delete();

        return response()->json(null, 204);
    }


    public function cartProductJoin()
    {
        //return view('cart');


        $cart = DB::table('cart_items')
            ->join('products', function ($join) {
                $join->on('cart_items.ProductID', '=', 'products.ProductID');
            })
            ->get();

        return response()->json($cart);
       // return view('cart')->with('carts', $cart);
    }
}
