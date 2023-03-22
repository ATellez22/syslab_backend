<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('barcode');
            $table->string('description', 255);
            $table->integer('price')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('restrict');
            //$table->foreignId('pattern_id')->constrained('pattern')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('restrict');
            //$table->foreignId('subcategory_id')->constrained('subcategories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('measure_id')->constrained('measures')->onUpdate('cascade')->onDelete('restrict');
            //$table->integer('taxrule'); //Impuesto
            //$table->integer('currency'); //Moneda
            //$table->integer('presentation');
            //$table->integer('supplier'); //Proveedor
            //$table->string('image');
            $table->decimal('minimum_stock', 8, 2)->nullable();
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
