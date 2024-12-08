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
            Schema::create('professionals', function (Blueprint $table) {
                $table->unsignedInteger('professionalId')->autoIncrement();
                $table->string('description');
                $table->unsignedInteger('userId');
                $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
                 
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('professionals');
        }
};
