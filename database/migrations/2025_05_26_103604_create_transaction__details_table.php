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
        Schema::create('transaction__details', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->foreignId('id_transaction')->constrained('transactions')->onDelete('cascade');
            $table->foreignId('id_medicine')->constrained('medicines')->onDelete('cascade');
            $table->integer('quantity');
            $table->unsignedBigInteger('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction__details');
    }
};
