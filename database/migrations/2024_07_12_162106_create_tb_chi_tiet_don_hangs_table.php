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
        Schema::create('tb_chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id');
            $table->unsignedBigInteger('san_pham_id');
            $table->integer('so_luong');
            $table->double('gia', 12, 2);
            $table->double('thanh_tien', 12, 2);
            $table->timestamps();

            $table->foreign('don_hang_id')->references('id')->on('tb_don_hangs');
            $table->foreign('san_pham_id')->references('id')->on('tb_san_phams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_chi_tiet_don_hangs');
    }
};
