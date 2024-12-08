<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('service_professionals', function (Blueprint $table) {
            $table->bigIncrements('servProfId');
            $table->unsignedInteger('professionalId');
            $table->foreign('professionalId')->references('professionalId')->on('professionals')->onDelete('cascade');
            $table->unsignedInteger('serviceId');
            $table->foreign('serviceId')->references('serviceId')->on('services')->onDelete('cascade');
            $table->unsignedInteger('serviceTypeId');
            $table->foreign('serviceTypeId')->references('serviceTypeId')->on('serviceTypes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_professionals');
    }
};
