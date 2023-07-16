<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    //Unidad de medida
    public function index()
    {
        return Measure::where('state', 1)->get();
    }


    public function store(Request $request)
    {
        $measure = new Measure();
        $measure->description = $request->description;
        $measure->code = $request->code;
        $measure->save();
        return $measure;
    }


    public function show(Measure $measure)
    {
        return $measure;
    }


    public function update(Request $request, Measure $measure)
    {
        $measure->description = $request->description;
        $measure->code = $request->code;
        $measure->save();
        return $measure;
    }


    public function destroy(Measure $measure)
    {
        $measure->state = 0;
        $measure->save();
        return $measure;
    }
}
