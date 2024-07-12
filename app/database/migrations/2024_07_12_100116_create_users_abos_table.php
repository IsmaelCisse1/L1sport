<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_abos', function (Blueprint $table) {
            $table->increments('user_abo_id');
            $table->unsignedInteger('id');
            $table->unsignedInteger('abo_id');
            $table->timestamps();


            $table->foreign('id')->references('id')->on('utilisateurs');
            $table->foreign('abo_id')->references('abo_id')->on('abonnements');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_abos');
    }
};
