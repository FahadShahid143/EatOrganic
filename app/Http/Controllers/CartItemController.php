<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItems;

class CartItemController extends Controller
{
    public function index()
    {
        return CartItems::all();
    }

    public function show(CartItems $cartitem)
    {
        return $cartitem;
    }

    public function store(Request $request)
    {
        $cartitem = CartItems::create($request->all());

        return response()->json($cartitem, 201);
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
}
