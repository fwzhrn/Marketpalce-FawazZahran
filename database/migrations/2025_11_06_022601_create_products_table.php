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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('stores_id')->constrained('stores')->onDelete('cascade');
            $table->string('nama_produk', 100);
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->date('tanggal_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
