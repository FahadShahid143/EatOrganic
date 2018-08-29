<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use finfo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->get('ProductName');

        $products = Product::where('ProductName', 'like', "%{$data}%")->get();

        return response()->json($products, 201);

        /*return Response::json([
        'data' => $drivers
        ]);*/
    }

    




    public function index()
    {
        $products = DB::table('products')->get();


        foreach($products as $product){

            $product->ProductImage = str_replace("products\July2018","storage/products/july2018",$product->ProductImage);
            $filename = $product->ProductImage;
            $filename = (file_get_contents($filename));
            $product->ProductImage = base64_encode($filename);
            //$image = Array('image'=>json_encode(base64_encode($filename)));


            }
        return $products;
        //        return Product::all();
    }

    public function show($product)
    {
        $products = DB::table('products')->where('ProductID',$product)->get();


        foreach($products as $product){

            $product->ProductImage = str_replace("products\July2018","storage/products/july2018",$product->ProductImage);
            $filename = $product->ProductImage;
            $filename = (file_get_contents($filename));
            $product->ProductImage = base64_encode($filename);
            //$image = Array('image'=>json_encode(base64_encode($filename)));


        }
        return str_replace( array( '[', ']'), '', json_encode($products))  ;
        //return $product;
    }

    public function store(Request $request)
    {
        $ProductName = $request->ProductName;
        $ProductDesc = $request->ProductDesc;
        $ProductImage = $request->ProductImage;
        $UserID = $request->CompanyID ;
        $Price = $request->Price;
        $Discount = $request->Discount;
        $Availability = $request->Availability;
        $Ripeness = $request->Ripeness;



        /*$image = $ProductImage;  // your base64 encoded
        $image = str_replace('data:image/jpg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'jpg';
        \File::put('storage/products/july2018'. '/' . $imageName, base64_decode($image));*/


        $file = base64_decode($ProductImage);
        $folderName = 'storage/products/july2018/';
        $imageName = str_random(10).'.'.'jpg';
        $destinationPath = $folderName;
        $success = file_put_contents($folderName.$imageName, $file);

        $imageName = "products\July2018/".$imageName;

        $product = DB::table('products')->insert(array('ProductName'=>$ProductName,'ProductDesc'=> $ProductDesc,'ProductImage'=> $imageName,'CompanyID'=> $UserID,'Price'=> $Price,'Discount'=> $Discount, 'Availability'=> $Availability,'Ripeness'=> $Ripeness));


        return Product::orderBy('ProductID', 'desc')->first();
        //return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        if($request->ProductImage){



            $file = base64_decode($request->ProductImage);
            $folderName = 'storage/products/july2018/';
            $imageName = str_random(10).'.'.'jpg';
            $destinationPath = $folderName;
            $success = file_put_contents($folderName.$imageName, $file);

            $request['ProductImage'] = "products\July2018".$imageName;
        }
        else {

            $product->update($request->all());

            return response()->json($product, 200);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }

}
