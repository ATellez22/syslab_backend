<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::where('state', 1)->get();
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->description = $request->description;
        $category->save();
        return $category;
    }


    public function show(Category $category)
    {
        return $category;
    }


    public function update(Request $request, Category $category)
    {
        $category->description = $request->description;
        $category->save();
        return $category;
    }


    public function destroy(Category $category)
    {
        $category->state = 0;
        $category->save();
        return $category;
    }
}
