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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->string('description');
            $table->date('date');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_Id');
            $table->foreign('user_Id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
