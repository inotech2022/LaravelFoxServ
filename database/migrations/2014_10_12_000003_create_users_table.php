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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('userId')->autoIncrement();
            $table->string('name');
            $table->string('lastName');
            $table->char('phone', 11);
            $table->string('cpf', 11); 
            $table->date('birthDate');
            $table->string('profilePic')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'user']);
            $table->boolean('status')->default(true);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
