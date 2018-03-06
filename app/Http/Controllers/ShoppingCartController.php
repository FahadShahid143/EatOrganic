<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return ShoppingCart::all();
    }

    public function show(ShoppingCart $shoppingcart)
    {
        return $shoppingcart;
    }

    public function store(Request $request)
    {
        $shoppingcart = ShoppingCart::create($request->all());

        return response()->json($shoppingcart, 201);
    }

    public function update(Request $request, ShoppingCart $shoppingcart)
    {
        $shoppingcart->update($request->all());

        return response()->json($shoppingcart, 200);
    }

    public function delete(ShoppingCart $shoppingcart)
    {
        $shoppingcart->delete();

        return response()->json(null, 204);
    }
}
