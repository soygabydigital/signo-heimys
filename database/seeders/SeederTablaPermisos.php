<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    
    public function run()
    {
        $permisos=[
            
           //Tabla Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',            
            //Tabla Users
            'ver-user',
            'crear-user',
            'editar-user',
            'borrar-user',
            //Periodo Escolar
            'editar-anio',
            'editar-grado',
            'editar-seccion',
            'editar-corte',
            //Tabla Alumnos
            'ver-alumno',
            'crear-alumno',
            'editar-alumno',           
            //Tabla docentes
            'ver-docente',
            'crear-docente',
            'editar-docente',             
            //Tabla Asignaturas
            'ver-asignatura',
            'crear-asignatura',
            'editar-asignatura',
            //Tabla Natriculas
            'ver-matricula',
            'crear-matricula',
            'editar-matricula',
            //Tabla Notas
            'ver-nota',
            'crear-nota',
            'editar-nota',
            //Tabla Grupos Estables
            'ver-grupo',
            'crear-grupo',
            'editar-grupo',
             //Tabla Asignaturas por Periodo
             'ver-periodo_asignatura',
             'crear-periodo_asignatura',
             'editar-periodo_asignatura',
              //Tabla Matria Pendiente*/
            'ver-pendiente',
            'crear-pendiente',
            'editar-pendiente',
              //Tabla Matria Pendiente*/
              'ver-retiro',
              'crear-retiro',
              'editar-retiro',

            

        ];

        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
