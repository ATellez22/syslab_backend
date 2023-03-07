<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class BrandController extends Controller
{

    public function index()
    {
        return Brand::where('state', 1)->get();
    }


    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->description = $request->description;
        $brand->save();
        return $brand;
    }


    public function show(Brand $brand)
    {
        return $brand;
    }


    public function update(Request $request, Brand $brand)
    {
        $brand->description = $request->description;
        $brand->save();
        return $brand;
    }


    public function destroy(Brand $brand)
    {
        $brand->state = 0;
        $brand->save();
        return $brand;
    }
}
