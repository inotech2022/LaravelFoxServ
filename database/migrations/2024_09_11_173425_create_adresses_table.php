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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            // $table->foreignId('userId')->constrained('users'); // Fazendo referência à tabela users
            $table->string('zipCode');
            $table->string('uf');
            $table->string('city');
            $table->string('district');
            $table->string('street');
            $table->string('number')->nullable();
            $table->timestamps(); // Se quiser usar timestamps
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
