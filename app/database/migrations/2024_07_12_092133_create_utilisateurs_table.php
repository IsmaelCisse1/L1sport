<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50)->unique();
            $table->string('mdp', 100);
            $table->string('adresse', 255);
            $table->string('payclick_user', 50);
            $table->timestamps();
        });
    }


    public function down()
    {
    }
};
