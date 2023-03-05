<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_inventory extends Model
{
    use HasFactory;

    public function Inventory() {
        return $this->belongsTo(Inventory::class);
    }

    public function Purchase() {
        return $this->belongsTo(Purchase::class);
    }
}
