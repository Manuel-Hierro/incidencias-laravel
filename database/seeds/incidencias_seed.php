<?php

use Illuminate\Database\Seeder;

class incidencias_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidencias')->insert(array(            
            'id' => '1',
            'usuario_id' => '1',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'media',
            'aula' => 'Aula 1', 
            'asunto' => 'Fuego', 
            'descripcion' => 'El ordenador Nº2 esta ardiendo'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '2',
            'usuario_id' => '1',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'alta',
            'aula' => 'Aula 1', 
            'asunto' => 'Robo', 
            'descripcion' => 'Los ordenadores del Aula 1 han sido robados'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '3',
            'usuario_id' => '10',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'alta',
            'aula' => 'Aula 2', 
            'asunto' => 'Baja', 
            'descripcion' => 'Antonio esta de baja'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '4',
            'usuario_id' => '10',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'alta',
            'aula' => 'Aula 2', 
            'asunto' => 'Hace calor', 
            'descripcion' => 'El aire acondicionado no funciona'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '5',
            'usuario_id' => '20',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'baja',
            'aula' => 'Aula 3', 
            'asunto' => 'Sin conexion', 
            'descripcion' => 'Se ha ido el internet en el instituto'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '6',
            'usuario_id' => '30',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'media',
            'aula' => 'Aula 3', 
            'asunto' => 'Estropeado', 
            'descripcion' => 'Algunos ordenadores no funcionan'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '7',
            'usuario_id' => '50',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'baja',
            'aula' => 'Aula 4', 
            'asunto' => 'Muerte', 
            'descripcion' => 'Algunos alumnos han muerto de aburrimiento'              
        ));  
        DB::table('incidencias')->insert(array(            
            'id' => '8',
            'usuario_id' => '50',
            'fecha_incidencia' => date('Y-m-d H:i:s'),
            'prioridad' => 'baja',
            'aula' => 'Aula 4', 
            'asunto' => 'Muerte Feliz', 
            'descripcion' => 'Algunos alumnos han muerto de risa'  
         ));  
    }
}
