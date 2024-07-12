<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gestion_admins', function (Blueprint $table) {
            $table->increments('gestion_admin_id');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('id');
            $table->timestamps();

            $table->foreign('article_id')->references('article_id')->on('articles');
            $table->foreign('id')->references('id')->on('utilisateurs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gestion_admins');
    }
};
