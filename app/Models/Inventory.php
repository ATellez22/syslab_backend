<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    //Referenciales asigandos a Inventarios.
    public function Article() {
        return $this->belongsTo(Article::class);
    }
}
