<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return response()->json($customer, 200);
    }

    public function delete(Customer $customer)
    {
        $customer->delete();

        return response()->json(null, 204);
    }
}
