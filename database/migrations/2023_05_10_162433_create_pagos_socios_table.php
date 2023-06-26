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
        Schema::create('pagos_socios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('socio_id')->constrained('socios','user_id');
            $table->foreignId('pagos_tipo_id')->constrained('pagos_tipos');
            $table->string('numero_celular')->nullable();
            $table->string('numero_cc')->nullable();
            $table->string('nuemro_cci')->nullable();
            $table->string('qr_imagen')->nullable();
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
        Schema::dropIfExists('pagos_socios');
    }
};
