<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        return Article::with(['Brand', 'Measure', 'Category'])
            ->where('state', 1)->get();
    }


    public function store(Request $request)
    {
        $article = new Article();
        $article->barcode = $request->barcode;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->purchase_price = $request->purchase_price;
        $article->brand_id = $request->brand_id;
        $article->category_id = $request->category_id;
        $article->measure_id = $request->measure_id;
        $article->minimum_stock = $request->minimum_stock;
        $article->save();
        return $article;
    }


    public function show(Article $article)
    {
        // $article->brand_id = $article->Brand;
        // $article->measure_id = $article->Measure;
        // $article->category_id = $article->Category;

        return $article;

    }


    public function update(Request $request, Article $article)
    {
        $article->barcode = $request->barcode;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->purchase_price = $request->purchase_price;
        $article->brand_id = $request->brand_id;
        $article->category_id = $request->category_id;
        $article->measure_id = $request->measure_id;
        $article->minimum_stock = $request->minimum_stock;
        $article->save();
        return $article;
    }


    public function destroy(Article $article)
    {
        $article->state = 0;
        $article->save();
        return $article;
    }
}
