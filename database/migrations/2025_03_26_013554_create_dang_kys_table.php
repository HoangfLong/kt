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
        Schema::create('dang_kys', function (Blueprint $table) {
            $table->id('MaDK');
            $table->date('NgayDK');
            $table->unsignedBigInteger('MaSV'); // Khóa ngoại
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('MaSV')->references('MaSV')->on('sinh_viens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dang_kys');
    }
};
