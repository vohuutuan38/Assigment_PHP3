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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('anh_dai_dien')->default('/uploads/avatar.png');
            $table->string('ho_ten');
            $table->string('email')->unique();
            $table->string('so_dien_thoai', 11);
            $table->enum('gioi_tinh', ['Nam', 'Nu', 'Khac'])->default('Khac');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->boolean('trang_thai')->default(1);
            $table->unsignedBigInteger('id_chuc_vus');
            $table->foreign('id_chuc_vus')->references('id')->on('chuc_vus'); //->onDelete('')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
