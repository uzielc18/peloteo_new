<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index();
            $table->primary('user_id');
            $table->string('razon_social')->nullable();
            $table->string('ruc')->nullable()->comment('ruc');
            $table->string('dni')->nullable()->comment('ruc');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo_personal')->nullable();
            $table->string('correo_empresarial')->nullable();
            $table->char('estado',1)->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('socios');
    }
};
