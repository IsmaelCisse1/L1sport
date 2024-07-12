<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->timestamps();
            $table->bigIncrements('article_id');
            $table->string('titreArticle', 50);
            $table->text('contenuArticle');
            $table->string('photoArticle', 255);
            $table->string('videoArticle', 255);
        });
    }

    public function down(): void
    {
    }
};
