<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriMentoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_mentoring', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('materi');
            $table->string('keterangan');
            $table->enum('from', ['mentor','tenant']);
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenant')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('mentor_id')->references('id')->on('mentor')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_mentoring');
    }
}
