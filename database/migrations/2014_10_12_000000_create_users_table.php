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
            $table->bigIncrements('userId'); 
         
            $table->string('name');
            $table->string('lastName');
            $table->string('phone');
            $table->string('cpf');
            $table->date('birthDate');
            $table->string('profilePic')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('token');
            $table->enum('type', ['admin', 'user', 'comum']); 
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
