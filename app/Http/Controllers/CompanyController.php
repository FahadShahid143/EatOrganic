<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function webindex(){
        $cart = DB::table('users')
            ->join('products', function ($join) {
                $join->on('users.id', '=', 'products.CompanyID');
            })->where('id',Auth::user()->id)
            ->get();

        return view('vendorhome')->with('carts', $cart);
    }

    public function webupdate($id){
        $product = DB::table('products')->where('ProductID',$id)->get();

        return view('vendorproductedit')->with('product',$product);

    }

    public function vendorupdate(Request $request,$id){
        $pname = $request->ProductName;
        $discount = $request->Discount;
        $avail = $request->Availability;
        $status = $request->Status;
        $desc = $request->ProductDesc;



        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/products/july2018');
            $image->move($destinationPath, $name);

            DB::table('products')
                ->where('ProductID', $id)
                ->update(['ProductImage' => 'products\July2018/'.$name]);


            //return back()->with('success','Image Upload successfully');
        }
        DB::table('products')
            ->where('ProductID', $id)
            ->update(['ProductName' => $pname, 'Discount'=>$discount, 'Availability'=>$avail, 'Ripeness'=>$status, 'ProductDesc'=>$desc ]);

        return redirect()->route('vendor.home')->with('success_message', 'Item Edited!');

        //return route('vendor.home')->with('success_message', 'Item removed from the Cart!');
    }

    public function webaddproduct(){
        return view ('vendorproductadd');
    }

    public function webnewproduct(Request $request){
        $this->validate($request, [
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pname = $request->ProductName;
        $price = $request->Price;
        $discount = $request->Discount;
        $avail = $request->Availability;
        $ripe = $request->Status;
        $desc = $request->ProductDesc;
        $category = $request->Category;

        $lastid = DB::table('products')->orderBy('ProductID', 'desc')->value('ProductID');
        $lastid+=1;

        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name =  $image->getClientOriginalName();
            //$name = $image->getClientOriginalName . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/products/july2018');
            $image->move($destinationPath, $name);

        }

        $values = array('ProductName' => $pname, 'ProductDesc'=>$desc, 'ProductImage'=>'products/july2018/'.$name, 'CompanyID'=>Auth::user()->id, 'Price'=>$price, 'Discount'=>$discount,'Availability'=>$avail,'Ripeness'=>$ripe );
        DB::table('products')->insert($values);

        $val=array('ProductID'=>$lastid, 'CategoryID'=>$category);
        DB::table('category_product')->insert($val);

        return redirect()->route('vendor.home')->with('success_message', 'Product Added!');

    }
    public function destroy($id){
        $item = Product::find($id);
        $item->delete();

        return redirect()->back()->with('success_message', 'Item removed from the List!');
    }



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

    public function vendorproductjoin(){
        $cart = DB::table('users')
            ->join('products', function ($join) {
                $join->on('users.id', '=', 'products.CompanyID');
            })
            ->get();
        return $cart;
    }

    public function vendorlist(){
        $vendor = DB::table('users')->where('responsibility','Vendor')->get();
        return $vendor;
    }

    public function vendorprod($id){
        $vendor = DB::table('users')
            ->join('products', function ($join) {
                $join->on('users.id', '=', 'products.CompanyID');
            })
            ->where('id',$id)
            ->get();
        return $vendor;
    }
}
