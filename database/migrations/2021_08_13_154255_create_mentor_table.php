<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mentor', 100);
            $table->string('alamat', 500);
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category_mentor')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('bidang_id')->references('id')->on('bidang_keahlian')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor');
    }
}
