<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        // return Article::with(['Brand', 'Measure', 'Category'])
        //     ->where('state', 1)->get();

        $model =  Article::where('state', 1)->get();
        $list = [];
        foreach ($model as $m) {
            $list[] = $this->kardex($m);
        }
        return $list;
    }

    public function kardex(Article $article)
    {
        $article->brand_id = $article->Brand;
        $article->measure_id = $article->Measure;
        $article->category_id = $article->Category;

        //Asociación 'hasMany' de Inventory en el modelo de Article
        //Se obtienen los valores de inventario relacionados con el id del articulo.
        //Alternativa al uso de una consulta con Eloquent usando 'join'.
        $article->inventories = $article->Inventory()->where('state', 1)->get();

        //Se registran los ingresos y egresos, y de ahi se saca el stock
        $article->income = $article->Inventory()->where('type', 1)->sum('quantity'); //ingreso
        $article->discharge = $article->Inventory()->where('type', 2)->sum('quantity'); //egreso
        $article->stock = $article->income - $article->discharge;

        $article->investment = $article->stock * $article->purchase_price; //inversión
        $article->valued = $article->stock * $article->price; //valorizado
        $article->profit = $article->valued - $article->investment; //ganancia

        return $article;
    }


    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->article_id = $request->article_id;
        $inventory->purchase = $request->purchase;
        $inventory->sale = $request->sale;
        $inventory->quantity = $request->quantity;
        $inventory->type = $request->type;
        $inventory->reason = $request->reason;
        $inventory->save();
        return $inventory;
    }


    public function show(Inventory $inventory)
    {
        return $inventory;
    }


    public function update(Request $request, Inventory $inventory)
    {
        $inventory->purchase = $request->purchase;
        $inventory->sale = $request->sale;
        $inventory->quantity = $request->quantity;
        $inventory->type = $request->type;
        $inventory->reason = $request->reason;
        $inventory->save();
        return $inventory;
    }


    public function destroy(Inventory $inventory)
    {
        $inventory->state = 0;
        $inventory->save();
        return $inventory;
    }
}
