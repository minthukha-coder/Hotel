<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('edit');
        if (isset($categoryId)) {
            $categoryEdit = Category::find($categoryId);
            $categories = Category::all();
            return view('category.index', compact('categories', 'categoryEdit'));
        }
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        Category::create($data);

        return back()->with('successMsg', 'A category has been created successfully');;
    }

    public function update(Request $request, $categoryId)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        Category::find($categoryId)->update($data);

        return redirect()->route('categories.index')->with('successMsg', 'A category has been updated successfully');
    }

    public function delete($categoryId)
    {
        Category::find($categoryId)->delete();
        return back()->with('successMsg', 'A category has been deleted successfully');
    }
}
