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
        Schema::table('canchas', function (Blueprint $table) {

            $table->string('distrito_id',11);
        });
        Schema::table('canchas', function (Blueprint $table) {

            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');

        });
    }

};
