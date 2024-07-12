<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->increments('abo_id');
            $table->string('nomAbo');
            $table->decimal('prixAbo', 10, 2);
            $table->text('descAbo');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('status', ['actif', 'inactif']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abonnements');
    }
};
