<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //Referenciales asigandos a Articulos. Debe hacerse con todos los casos.
    public function Brand() {
        return $this->belongsTo(Brand::class);
    }

    public function Measure() {
        return $this->belongsTo(Measure::class);
    }

    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function Inventory() {
        return $this->hasMany(Inventory::class);
    }

}

/*
    - belongsTo: Define una relación inversa de uno a uno o de uno a muchos.
    - hasMany: Define una relación de uno a muchos.
*/
