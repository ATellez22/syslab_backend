<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_inventory extends Model
{
    use HasFactory;

    public function Inventory() {
        return $this->belongsTo(Inventory::class);
    }

    public function Sale() {
        return $this->belongsTo(Sale::class);
    }
}
