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
        Schema::create('provincias', function (Blueprint $table) {
            $table->string('id',11)->unique()->index();
            $table->primary('id');
            $table->string('departamento_id',11);
            $table->string('nombre')->unique();
            $table->char('estado',1)->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('provincias', function (Blueprint $table) {
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');

              });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
};
