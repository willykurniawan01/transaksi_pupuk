<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string("kode");
            $table->unsignedBigInteger("pupuk_id")->nullable();
            $table->foreign("pupuk_id")->references("id")->on("pupuk")->onDelete("set null")->onUpdate("cascade");
            $table->double("jumlah");
            $table->date("tanggal");
            $table->string("kode_kb");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
