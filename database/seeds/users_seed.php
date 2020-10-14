<?php

use Illuminate\Database\Seeder;

class users_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(            
            'id' => '10',
            'nif' => '56565656R',
            'nombre' => 'manu',
            'apellido1' => 'jesus',
            'apellido2' => 'garcia', 
            'username' => 'manu', 
            'password' => '$2y$04$bzD2G5HF0WtH.04a1y2BZ.LB.XMDdX2aucrKM/xgCWF5RtCF89Wd6', 
            'perfil' => 'profesor',
            'email' => 'manu@manu.com', 
            'fotografia' => '',
            'telefono' => '959123456',
            'departamento' => 'informatica',
            'fecha' => date('Y-m-d H:i:s'),
            'activo' => 1            
        ));  
        DB::table('users')->insert(array(            
            'id' => '20',
            'nif' => '34565656R',
            'nombre' => 'jose',
            'apellido1' => 'garrido',
            'apellido2' => 'garcia', 
            'username' => 'jose', 
            'password' => '$2y$04$ttgEDe7MbTVNX7uTWLFz/ufFxKxoLRaLvcPjH9kUSEA7rqPtyohoS', 
            'perfil' => 'profesor',
            'email' => 'jose@jose.com', 
            'fotografia' => '',
            'telefono' => '959123456',
            'departamento' => 'informatica',
            'fecha' => date('Y-m-d H:i:s'),
            'activo' => 1          
        ));   
        DB::table('users')->insert(array(           
            'id' => '30',
            'nif' => '66565656R',
            'nombre' =>'juan',
            'apellido1' => 'miguel', 
            'apellido2' => 'garcia', 
            'username' => 'fernando', 
            'password' => '$2y$04$ttgEDe7MbTVNX7uTWLFz/ufFxKxoLRaLvcPjH9kUSEA7rqPtyohoS', 
            'perfil' => 'profesor',
            'email' => 'jose@jose.com',
            'fotografia' => '',
            'telefono' => '959123456',
            'departamento' => 'informatica',
            'fecha' => date('Y-m-d H:i:s'),
            'activo' => 1  
        ));        
    }
}
