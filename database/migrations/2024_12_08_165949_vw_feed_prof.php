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
            CREATE VIEW vw_feedProf AS
            SELECT 
                u.name AS name,
                u.userId AS userId,
                u.lastName AS lastName,
                u.phone AS phone,
                u.email AS email,
                u.cpf AS cpf,
                TIMESTAMPDIFF(YEAR, u.birthDate, CURDATE()) AS age,
                u.profilePic AS profilePic,
                p.description AS description,
                p.professionalId AS professionalId,
                s.serviceName AS serviceName,
                s.serviceId AS serviceId,
                st.serviceTypeName AS serviceTypeName,
                st.serviceTypeId AS serviceTypeId,
                ra.average AS average,
                a.city AS city,
                a.uf AS uf,
                COUNT(DISTINCT c.protocol) AS totalContracts
            FROM users u
            INNER JOIN professionals p ON u.userId = p.userId
            INNER JOIN service_professionals sp ON sp.professionalId = p.professionalId
            INNER JOIN services s ON sp.serviceId = s.serviceId
            INNER JOIN serviceTypes st ON s.serviceTypeId = st.serviceTypeId
            INNER JOIN addresses a ON u.userId = a.userId
            LEFT JOIN vw_ratingAverage ra ON ra.professionalId = p.professionalId
            LEFT JOIN contracts c ON c.professionalId = p.professionalId
            GROUP BY 
                u.userId, u.name, u.lastName, u.phone, u.email, u.cpf, u.birthDate,
                u.profilePic, p.professionalId, p.description, s.serviceId, s.serviceName,
                st.serviceTypeName, st.serviceTypeId, ra.average, a.city, a.uf
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_feedProf");
    }
};
