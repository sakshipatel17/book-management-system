<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }
    public function save_categories_fun(Request $request)
    {
        $request->validate([
            'categoryname' => 'required',

        ]);
        $cat = new Category;
        $cat->categoryname = $request->categoryname;
        $cat->save();
        return back()->with('success', 'Category Successfully Added..!!');
    }
    public function admin_category_view(Request $request)
    {
        $category = Category::where('id', '=', $request->admin_category_id)->get();
        return view('admin.showcategory', compact('category'));
    }
    public function admin_category_edit(Request $request)
    {
        $categories = Category::all();
        $category = Category::where('id', '=', $request->admin_category_id)->get();
        return view('admin.updatecategory', compact(['category','categories']));
    }
    public function update_category_fun(Request $request)
    {
        $request->validate([
            'categoryname' => 'required',
        ]);
        $cat = Category::find($request->categoryid);
        $cat->categoryname = $request->categoryname;
        $cat->save();
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }
    public function admin_category_delete(Request $request)
    {
        $categories = Category::find($request->admin_category_id);
        $categories->delete();
        $categories = Category::all();
        return view('admin.category', compact('categories'));        
    }
}
