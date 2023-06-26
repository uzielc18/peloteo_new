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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cancha_id')->constrained('canchas');
            $table->enum('estado_horario', ['libre', 'reservado', 'deshabilitado','usado'])->default('libre');
            $table->string('hora');
            $table->string('dia');
            $table->string('mes');
            $table->string('anio');
            $table->float('precio');
            $table->dateTime('fecha_horario');
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
        Schema::dropIfExists('horarios');
    }
};
