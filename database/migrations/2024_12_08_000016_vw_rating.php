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
        CREATE VIEW vw_rating AS
        SELECT
            u.name AS name,
            u.lastName AS lastName,
            u.profilePic AS profilePic,
            r.starAmount AS starAmount,
            r.comment AS comment,
            r.ratingDate AS ratingDate,
            c.protocol AS protocol,
            p.email AS email,
            p.professionalId AS professionalId
        FROM users u
        INNER JOIN ratings r ON u.userId = r.userId
        LEFT JOIN contracts c ON r.protocol = c.protocol
        LEFT JOIN vw_professionals p ON r.professionalId = p.professionalId
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_rating");
    }
};
