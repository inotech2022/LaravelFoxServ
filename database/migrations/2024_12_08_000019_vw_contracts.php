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
        CREATE VIEW vw_contracts AS
        SELECT DISTINCT
            u.userId AS userId,
            u.cpf AS cpf,
            u.name AS name,
            f.name AS professionalName,
            f.professionalId AS professionalId,
            s.serviceName AS serviceName,
            c.protocol AS protocol,
            c.price AS price,
            c.startDate AS startDate,
            c.endDate AS endDate,
            c.description AS description
        FROM vw_feedProf f
        INNER JOIN contracts c ON f.professionalId = c.professionalId
        INNER JOIN services s ON c.serviceId = s.serviceId
        INNER JOIN users u ON c.userId = u.userId
        GROUP BY
            u.userId,
            u.cpf,
            u.name,
            f.name,
            f.professionalId,
            s.serviceName,
            c.protocol,
            c.price,
            c.startDate,
            c.endDate,
            c.description,
            c.serviceId
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_contracts");
    }
};
