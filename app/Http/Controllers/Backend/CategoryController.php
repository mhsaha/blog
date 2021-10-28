<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Category;
use Auth;

class CategoryController extends Controller
{

    public function view()
    {
        $allData = Category::all();
        return view('backend.category.view-category', compact('allData'));
    }

    public function add()
    {
        return view('backend.category.add-category');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect()->route('categories.view')->with('success', 'Data saved
     successfully');
    }

    public function edit($id)
    {
        $editData = Category::find($id);
        return view('backend.category.edit-category', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $unit = Category::find($id);
        $unit->name = $request->name;
        $unit->updated_by = Auth::user()->id;
        $unit->save();
        return redirect()->route('categories.view')->with('success', 'Data saved
     successfully');
    }


    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.view')->with('success', 'Data Delete successfully');
    }
}
