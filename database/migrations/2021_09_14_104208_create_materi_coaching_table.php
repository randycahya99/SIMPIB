<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriCoachingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_coaching', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('materi');
            $table->string('keterangan');
            $table->enum('from', ['coach','tenant']);
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('coach_id')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenant')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('coach_id')->references('id')->on('coach')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_coaching');
    }
}
