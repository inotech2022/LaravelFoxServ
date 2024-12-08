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
        CREATE VIEW vw_ratingAverage AS
        SELECT
            p.professionalId AS professionalId,
            AVG(r.starAmount) AS average
        FROM professionals p
        LEFT JOIN contracts c ON p.professionalId = c.professionalId
        LEFT JOIN ratings r ON c.protocol = r.protocol OR p.professionalId = r.professionalId
        GROUP BY p.professionalId
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_ratingAverage");
    }
};
