<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint;

class CreateAutobansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autobans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bot_id')->index();
            $table->integer('xatid');
            $table->passthru('citext', 'regname');
            $table->integer('hours');
            $table->string('method');
            $table->timestamps();
            $table->foreign('bot_id')->references('id')->on('bots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autobans');
    }
}
