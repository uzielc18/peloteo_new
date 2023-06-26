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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->string('id',11)->unique()->index();
            $table->primary('id');
            //$table->foreignId('paise_id')->constrained('paises','id');
            $table->string('paise_id',11);
            $table->string('nombre')->unique();
            $table->char('estado',1)->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('departamentos', function (Blueprint $table) {
            $table->foreign('paise_id')->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
};
