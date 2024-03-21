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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_menu')->unsigned();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_menu')->references('id')->on('menu');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
