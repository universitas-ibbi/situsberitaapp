<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblkomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblkomentar', function (Blueprint $table) {
            $table->id();
            $table->string("isi_komentar");
            $table->unsignedBigInteger("berita_id");
            $table->foreign("berita_id")->references("id")->on("tblberita")->onDelete("cascade");
            $table->foreignId("user_id")->constrained();
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
        Schema::dropIfExists('tblkomentar');
    }
}
