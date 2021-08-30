<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('no_identitas', 50);
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('status_kawin', 20);
            $table->string('pendidikan_akhir', 50);
            $table->string('perguruan_tinggi', 100)->nullable();
            $table->string('jurusan', 100)->nullable();
            $table->string('alamat', 100);
            $table->string('kode_pos', 10);
            $table->string('no_hp');
            $table->string('email', 100);
            $table->string('website', 100);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant');
    }
}
