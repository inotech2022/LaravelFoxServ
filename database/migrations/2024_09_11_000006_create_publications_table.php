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
        Schema::create('publications', function (Blueprint $table) {
            $table->unsignedInteger('publicationId')->autoIncrement();
            $table->date('date');
            $table->string('image');
            $table->string('caption');
            $table->unsignedInteger('professionalId');
            $table->foreign('professionalId')->references('professionalId')->on('professionals')->onDelete('cascade');
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
};
