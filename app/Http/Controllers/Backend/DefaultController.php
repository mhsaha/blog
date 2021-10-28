<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Product;
use App\Models\Model\Supplier;
use App\Models\Model\Unit;
use App\Models\Model\Category;
use App\Models\Model\Purchase;
use Auth;

class DefaultController extends Controller
{
    public function getCategory(Request $request){
     $supplier_id = $request->supplier_id;
     $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
     //dd($allCategory);
     return response()->json($allCategory);
}

    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $allProduct = Product::where('category_id',$category_id)->get();
        return response()->json($allProduct);
    }

    public function getStock(Request $request) {
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }
}