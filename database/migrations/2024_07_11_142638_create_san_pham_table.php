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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('hinh_anh');
            $table->unsignedInteger('so_luong');
            $table->bigInteger('gia_san_pham');
            $table->date('ngay_nhap');
            $table->text('mo_ta');
            $table->unsignedBigInteger('danh_muc_id');

            // khóa ngoại
            $table->foreign('danh_muc_id')->references('id')->on('danh_muc')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
