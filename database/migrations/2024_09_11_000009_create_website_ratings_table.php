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
        Schema::create('websiteRatings', function (Blueprint $table) {
            $table->unsignedInteger('websiteRatingId')->autoIncrement();
            $table->string('starAmount');
            $table->string('comment');
            $table->date('ratingDate');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_ratings');
    }
};
