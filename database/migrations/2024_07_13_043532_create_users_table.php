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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('anh_dai_dien')->default('/uploads/avatar.png');
            $table->string('ho_ten', 50);
            $table->string('email')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->enum('gioi_tinh', ['Nam', 'Nu', 'Khac'])->default('Khac');
            $table->string('dia_chi')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('chuc_vu_id')->default(2);
            $table->boolean('trang_thai')->default(1);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
