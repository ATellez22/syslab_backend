<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function Brand() {
        return $this->belongsTo(Brand::class);
    }

    public function Measure() {
        return $this->belongsTo(Measure::class);
    }

    public function Category() {
        return $this->belongsTo(Category::class);
    }

}
