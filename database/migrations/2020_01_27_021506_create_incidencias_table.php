<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 
        Schema::table('incidencias', function (Blueprint $table) {
            //
        }); 
        */

        DB::statement("
        CREATE TABLE IF NOT EXISTS `incidencia` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `usuario_id` int(11) NOT NULL,  
            `fecha_incidencia` varchar(255) DEFAULT NULL,
            `prioridad` varchar(255) DEFAULT NULL,  
            `aula` varchar(255) DEFAULT NULL, 
            `asunto` varchar(255) DEFAULT NULL, 
            `descripcion` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `fk_incidencia_usuario_idx` (`usuario_id`)
          ) ENGINE = InnoDB DEFAULT CHARSET = utf8;");  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidencias', function (Blueprint $table) {
            //
        });
    }
}
