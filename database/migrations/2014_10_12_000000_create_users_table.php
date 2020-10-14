<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

       /*  DB::statement("
        CREATE TABLE IF NOT EXISTS `usuario` 
        (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `nif` varchar(255) DEFAULT NULL,
          `nombre` varchar(255) DEFAULT NULL,
          `apellido1` varchar(255) DEFAULT NULL,
          `apellido2` varchar(255) DEFAULT NULL,
          `username` varchar(255) DEFAULT NULL,  
          `password` varchar(255) DEFAULT NULL,
          `perfil` varchar(255) DEFAULT NULL,
          `email` varchar(255) DEFAULT NULL,
          `fotografia` varchar(255) DEFAULT NULL,
          `telefono` varchar(9) DEFAULT NULL,
          `departamento` varchar(255) DEFAULT NULL,  
          `fecha` varchar(255) DEFAULT NULL,
          `activo` tinyint(1) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) 
        ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;
        "); */
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
}
