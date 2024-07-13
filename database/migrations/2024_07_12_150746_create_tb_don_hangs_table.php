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
        Schema::create('tb_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoi_dung_id');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('so_dien_thoai_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->dateTime('ngay_dat');
            $table->double('tong_tien', 12, 2);
            $table->text('ghi_chu');
            $table->unsignedBigInteger('phuong_thuc_thanh_toan_id');
            $table->unsignedBigInteger('trang_thai_id');
            $table->timestamps();

            $table->foreign('nguoi_dung_id')->references('id')->on('tb_tai_khoans');
            $table->foreign('phuong_thuc_thanh_toan_id')->references('id')->on('tb_phuong_thuc_thanh_toans');
            $table->foreign('trang_thai_id')->references('id')->on('tb_trang_thai_don_hangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_don_hangs');
    }
};
