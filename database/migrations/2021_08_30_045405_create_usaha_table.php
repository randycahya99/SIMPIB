<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usaha', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha', 100);
            $table->string('produk', 100);
            $table->string('bentuk_badan', 50);
            $table->string('kategori_usaha', 100);
            $table->date('mulai_usaha');
            $table->string('alamat_usaha', 100);
            $table->string('kode_pos_usaha', 10);
            $table->string('no_hp_usaha');
            $table->string('email_usaha', 100);
            $table->string('website_usaha', 100);
            $table->integer('modal');
            $table->integer('omzet_1')->nullable();
            $table->integer('omzet_2')->nullable();
            $table->integer('omzet_3')->nullable();
            $table->integer('profit_1')->nullable();
            $table->integer('profit_2')->nullable();
            $table->integer('profit_3')->nullable();
            $table->integer('modal_sendiri')->nullable();
            $table->integer('modal_keluarga')->nullable();
            $table->integer('modal_investor')->nullable();
            $table->integer('modal_bank')->nullable();
            $table->integer('modal_total')->nullable();
            $table->integer('jumlah_cabang')->nullable();
            $table->integer('jumlah_pegawai')->nullable();
            $table->string('perintis');
            $table->string('prestasi')->nullable();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenant')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usaha');
    }
}
