<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->String('description');
            $table->String('image');
            $table->String('motcle');
            $table->String('prerequis');
            $table->String('dure');
            $table->String('contenu');
            $table->boolean('avecinscription')->default('1')->nullable();
            $table->boolean('public')->nullable();
            $table->boolean('etatinscription')->default('1')->nullable();
            $table->float('prix')->nullable();
            $table->boolean('etat')->default('1')->nullable();
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
        Schema::dropIfExists('formations');
    }
}
