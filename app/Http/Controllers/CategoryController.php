<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }

    public function CategoryProductJoin($category)
    {

        $products = DB::table( 'category' )
            ->join( 'category_product', 'category.CategoryID', '=', 'category_product.CategoryID' )
            ->join( 'products', 'products.ProductID', '=', 'category_product.ProductID' )
            ->where( 'category.CategoryID', $category)
            ->get();




        foreach($products as $product){

            $product->ProductImage = str_replace("products\July2018","storage/products/july2018",$product->ProductImage);
            $filename = $product->ProductImage;
            $filename = (file_get_contents($filename));
            $product->ProductImage = base64_encode($filename);
            //$image = Array('image'=>json_encode(base64_encode($filename)));


        }
        return $products;
/*

        $item = DB::table('categories')
            ->join('category_product', function ($join) {
                $join->on('categories.CategoryID', '=', 'category_product.CategoryID');
            })->where('categories.CategoryID', $category)
            ->get();*/

        return response()->json($item);
    }
}
