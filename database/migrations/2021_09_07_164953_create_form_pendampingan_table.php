<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPendampinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pendampingan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('perihal', 1000);
            $table->integer('sdm_total');
            $table->integer('sdm_lepas');
            $table->string('status_inkubator');
            $table->integer('luas_bangunan');
            $table->string('kepemilikan_teknologi');
            $table->string('target_akhir_tahun');
            $table->string('target_saat_ini');
            $table->integer('jumlah_anggaran_ppbt');
            $table->integer('anggaran_inkubator');
            $table->string('jumlah_produksi');
            $table->string('jumlah_penjualan');
            $table->string('harga_produksi');
            $table->integer('harga_produksi_unit');
            $table->integer('harga_jual_unit');
            $table->string('perijinan_perusahaan');
            $table->string('perijinan_produk');
            $table->string('nama_mesin');
            $table->string('jumlah_mesin');
            $table->string('total_nilai_mesin');
            $table->string('inkubator_produk');
            $table->string('inkubator_bisnis');
            $table->string('inkubator_administrasi');
            $table->string('lama_kontrak');
            $table->string('masalah_administrasi');
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
        Schema::dropIfExists('form_pendampingan');
    }
}
