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
        CREATE VIEW vw_likes AS
        SELECT 
            u.name AS name,
            u.lastName AS lastName,
            u.profilePic AS profilePic,
            c.likeDate AS likeDate,
            x.professionalId AS professionalId
        FROM user_publication c
        INNER JOIN users u ON u.userId = c.userId
        INNER JOIN publications p ON c.publicationId = p.publicationId
        INNER JOIN professionals x ON p.professionalId = x.professionalId
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_likes");
    }
};
