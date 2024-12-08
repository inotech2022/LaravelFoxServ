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
        Schema::create('ratings', function (Blueprint $table) {
            $table->unsignedInteger('ratingId')->autoIncrement();
            $table->string('starAmount');
            $table->string('comment');
            $table->date('ratingDate');
            $table->unsignedInteger('userId'); 
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->unsignedInteger('protocol');
            $table->foreign('protocol')->references('protocol')->on('contracts')->onDelete('cascade');
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
        Schema::dropIfExists('ratings');
    }
};
