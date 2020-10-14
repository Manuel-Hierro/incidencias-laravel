<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 
        Schema::table('logs', function (Blueprint $table) {
            //
        }); 
        */

        DB::statement("
        CREATE TABLE IF NOT EXISTS `log` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `usuario_id` int(11) NOT NULL,
            `fecha_log` varchar(255) DEFAULT NULL,
            `accion` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `fk_log_usuario_idx` (`usuario_id`)
          ) ENGINE = InnoDB DEFAULT CHARSET = utf8;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            //
        });
    }
}
