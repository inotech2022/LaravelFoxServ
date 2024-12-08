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
        DB::statement("
        CREATE VIEW vw_professionals AS
        SELECT 
            u.userId AS userId,
            u.name AS name,
            u.lastName AS lastName,
            u.phone AS phone,
            u.cpf AS cpf,
            u.birthDate AS birthDate,
            u.profilePic AS profilePic,
            u.email AS email,
            u.password AS password,
            u.type AS type,
            p.professionalId AS professionalId,
            p.description AS description
        FROM users u
        INNER JOIN professionals p ON u.userId = p.userId
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_professionals");
    }
};
