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
        Schema::create('box_of_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('box_id')->constrained('boxes')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('type');
            $table->integer('total');
            $table->text('reason');
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_of_movements');
    }
};
