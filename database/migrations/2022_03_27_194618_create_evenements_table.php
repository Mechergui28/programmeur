<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->String('enonce');
            $table->String('image');
            $table->String('fichier');
            $table->String('motcle');
            $table->String('comite');
            $table->String('programme');
            $table->string('type');
            $table->boolean('avecinscription')->nullable();
            $table->boolean('aveclimite')->nullable();
            $table->String('limite');
            $table->boolean('etatinscription')->nullable();
            $table->boolean('public')->nullable();
            $table->boolean('etat')->nullable();
            $table->Date('datedebut');
            $table->Date('datefin');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('evenements');
    }
}
