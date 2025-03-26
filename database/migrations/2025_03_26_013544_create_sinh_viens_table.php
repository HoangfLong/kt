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
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id('MaSV');
            $table->string('HoTen');
            $table->string('GioiTinh');
            $table->date('NgaySinh');
            $table->string('Hinh')->nullable();
            $table->unsignedBigInteger('MaNganh'); // Khóa ngoại
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('MaNganh')->references('MaNganh')->on('nganh_hocs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinh_viens');
    }
};
