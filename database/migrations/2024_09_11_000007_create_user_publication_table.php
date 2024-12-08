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
        Schema::create('user_publication', function (Blueprint $table) {
            $table->unsignedInteger('likeId')->autoIncrement();
            $table->unsignedInteger('publicationId');
            $table->foreign('publicationId')->references('publicationId')->on('publications')->onDelete('cascade');
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->timestamp('likeDate')->useCurrent();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_publication');
    }
};
