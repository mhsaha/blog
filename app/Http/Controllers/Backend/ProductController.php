<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\product;
use App\Models\Model\Supplier;
use App\Models\Model\Unit;
use App\Models\Model\Category;
use Auth;

class ProductController extends Controller
{
    public function view()
    {
        $allData = Product::all();
        
        return view('backend.product.view-product', compact('allData'));
    }

    public function add()
    {
        $data['suppliers'] = Supplier::all();
        $data['units']   = Unit::all();
        $data['categories']   = Category::all();
        return view('backend.product.add-product', $data);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->quantity = "0";
        $product->created_by = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success', 'Data saved
         successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['units']   = Unit::all();
        $data['categories']   = Category::all();
        return view('backend.product.edit-product',$data);
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->quantity = "0";
        $product->updated_by = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success', 'Data saved
         successfully');
    }


    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.view')->with('success', 'Data Delete successfully');
    }
}
