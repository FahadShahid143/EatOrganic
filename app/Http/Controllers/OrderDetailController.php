<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;

class OrderDetailController extends Controller
{
    public function index()
    {
        return OrderDetail::all();
    }

    public function show(OrderDetail $orderdetail)
    {
        return $orderdetail;
    }

    public function store(Request $request)
    {
        $orderdetail = OrderDetail::create($request->all());

        return response()->json($orderdetail, 201);
    }

    public function update(Request $request, OrderDetail $orderdetail)
    {
        $orderdetail->update($request->all());

        return response()->json($orderdetail, 200);
    }

    public function delete(OrderDetail $orderdetail)
    {
        $orderdetail->delete();

        return response()->json(null, 204);
    }
}
