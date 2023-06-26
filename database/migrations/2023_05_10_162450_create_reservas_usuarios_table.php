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
        Schema::create('reservas_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horario_id')->constrained('horarios');
            $table->foreignId('pagos_socio_id')->constrained('pagos_socios');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('estado_reserva', ['pendiente', 'cancelado', 'pagado', 'time_up'])->default('pendiente')
                ->comment('cancelado por el usario, time_up por que se termino el tiempo de espera');
            $table->string('comprobante')->nullable();
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
        Schema::dropIfExists('reservas_usuarios');
    }
};
