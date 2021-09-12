<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriPendampinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_pendampingan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('materi');
            $table->string('keterangan');
            $table->enum('from', ['pendamping','tenant']);
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('pendamping_id')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenant')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('pendamping_id')->references('id')->on('pendamping')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_pendampingan');
    }
}
