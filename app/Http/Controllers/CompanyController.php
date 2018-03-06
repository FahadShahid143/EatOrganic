<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function show(Company $company)
    {
        return $company;
    }

    public function store(Request $request)
    {
        $company = Company::create($request->all());

        return response()->json($company, 201);
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());

        return response()->json($company, 200);
    }

    public function delete(Company $company)
    {
        $company->delete();

        return response()->json(null, 204);
    }
}
