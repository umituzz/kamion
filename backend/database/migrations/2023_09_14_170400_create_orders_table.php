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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipper_id')->constrained();
            $table->foreignId('load_type_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->bigInteger('commodity');
            $table->foreignId('departure_city_id');
            $table->foreignId('arrival_city_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
