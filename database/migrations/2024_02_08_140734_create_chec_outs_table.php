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
        Schema::create('chec_outs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('country')->nullable();
            $table->string('firstname')->nullable();
            $table->string('secoundname')->nullable();
            $table->string('adress')->nullable();
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('save')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chec_outs');
    }
};
