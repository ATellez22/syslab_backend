<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;

    //Pattern = Modelo (Para no utilizar 'Model'. Relacionado con Articulos)

    public function Brand() {
        return $this->belongsTo(Brand::class);
    }

}
