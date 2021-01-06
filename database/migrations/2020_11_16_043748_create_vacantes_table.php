<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagen');
            $table->text('skill');
            $table->text('descripcion');
            $table->boolean('activa')->default(true);
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('experiencia_id');
            $table->unsignedBigInteger('ubicacion_id');
            $table->unsignedBigInteger('salario_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('experiencia_id')->references('id')->on('experiencias');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacions');
            $table->foreign('salario_id')->references('id')->on('salarios');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacantes');
    }
}
