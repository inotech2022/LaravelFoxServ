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
        Schema::create('complaints', function (Blueprint $table) {
            $table->unsignedInteger('complaintId')->autoIncrement();
            $table->string('reason');
            $table->date('complaintDate');
            $table->string('otherReason')->nullable();
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('complaints');
    }
};
