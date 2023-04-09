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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigInteger('InvoiceNo');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();
            // composite key ( InvoiceNo, product_id)
            $table->primary(['InvoiceNo', 'product_id']);
            // set FK
            $table->foreign('InvoiceNo')->references('InvoiceNo')->on('transactions');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
