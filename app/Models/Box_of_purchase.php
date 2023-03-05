<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box_of_purchase extends Model
{
    use HasFactory;

    public function Box() {
        return $this->belongsTo(Box::class);
    }

    public function Purchase() {
        return $this->belongsTo(Purchase::class);
    }
}
