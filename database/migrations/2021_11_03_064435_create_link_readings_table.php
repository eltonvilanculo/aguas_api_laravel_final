<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_readings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_zona',4);
            $table->string('id_utilizador',128);
            $table->integer('status')->default(0)->comment('0-pending 1-done 2-overdue');
            $table->foreign('id_zona')->references('zona_id')->on('zona')->onDelete('cascade');
            $table->foreign('id_utilizador')->references('utilizador_id')->on('utilizador')->onDelete('cascade');
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
        Schema::dropIfExists('link_readings');
    }
}
