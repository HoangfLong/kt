<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_dang_kys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaDK');
            $table->unsignedBigInteger('MaHP');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('MaDK')->references('MaDK')->on('dang_kys')->onDelete('cascade');
            $table->foreign('MaHP')->references('MaHP')->on('hoc_phans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_dang_kys');
    }
};
