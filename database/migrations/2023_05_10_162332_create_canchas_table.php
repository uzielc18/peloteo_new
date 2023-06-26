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
        Schema::create('canchas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locale_id')->constrained('locales');
            $table->foreignId('socio_id')->constrained('socios','user_id');
            $table->foreignId('canchas_tipo_id')->constrained('canchas_tipos');
            $table->foreignId('jugadore_id')->constrained('jugadores');
            $table->integer('codigo')->unique();
            $table->char('prefijo',3);
            $table->string('direccion');
            $table->string('aforo');
            $table->string('google_map');
            $table->string('lat');
            $table->string('lang');
            $table->smallInteger('min_horas');
            $table->smallInteger('max_horas');
            $table->float('precio');
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
        Schema::dropIfExists('canchas');
    }
};
