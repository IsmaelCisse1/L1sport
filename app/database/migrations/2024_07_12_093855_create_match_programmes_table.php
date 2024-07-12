<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('match_id');
            $table->unsignedInteger('club_id');
            $table->string('lieuMatch', 50);
            $table->dateTime('dateMatch');
            $table->string('scoreMatch', 10);
            $table->timestamps();

            $table->foreign('club_id')->references('club_id')->on('clubs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
