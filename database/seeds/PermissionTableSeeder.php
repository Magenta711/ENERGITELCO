<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Lista de roles',
            'Crear roles',
            'Editar roles',
            'Eliminar roles',
            'Lista de solicitudes',
            'Lista de usuarios',
            'Ver usuarios',
            'Crear usuarios',
            'Eliminar usuarios',
            'Editar usuarios',
            'Descargar PDF de solicitudes',
            'Digitar formulario de Permisos de trabajo',
            'Digitar formulario de Inspección y protección contra caídas',
            'Ver solicitudes de empleo',
            'Aprobar solicitud de Permisos de trabajo',
            'Aprobar solicitud de Inspección y protección contra caídas',
            'Aprobar solicitud de Inspección detallada de vehículos',
            'Digitar formulario de inspección detallada de vehículos',
            'Aprobar solicitud de Revisión y asignación de herramientas',
            'Digitar formulario de Revisión y asignación de herramientas',
            'Consultar cartelera',
            'Descargar documentos de la cartelera',
            'Editar documentos de la cartelera',
            'Eliminar documentos de la cartelera',
            'Crear documentos para la cartelera',
            'Digitar formulario de entrega de dotación personal',
            'Digitar formulario de lista de verificación para el mantenimiento de computadores',
            'Digitar formulario de solicitud de permiso laboral o notificación de incapacidad',
            'Aprobar solicitud de lista de verificación para el mantenimiento de computadores',
            'Aprobar solicitud de entrega de dotación personal',
            'Aprobar solicitud de permiso laboral o notificación de incapacidad',
            'Lista de proveedores',
            'Lista de clientes',
            'Lista de proyectos',
            'Lista de evaluaciones de desempeño',
            'Lista de evaluaciones de satisfacción del cliente',
            'Ver evaluaciones de proveedores',
            'Configuraciones generales',
            'Configuraciones del sistema',
            'Configurar mensajes en el sistema',
            'Configuraciones para proyectos proyectos',
            'Consultar permisos de trabajo',
            'Consultar inspecciones de equipos de protección contra caídas',
            'Consultar inspecciones detalladas de vehículos',
            'Consultar revisión y asignación de herramientas',
            'Consultar entrega de dotación personal',
            'Consultar listas de verificación para el mantenimiento de los computadores',
            'Consultar solicitud de permisos laborales o notificaciones de incapacidad médica',
            'Descargar PDF de permisos de trabajo',
            'Descargar PDF de inspecciones de equipos de protección contra caídas',
            'Descargar PDF de inspecciones detalladas de vehículos',
            'Descargar PDF de revisión y asignación de herramientas',
            'Descargar PDF de entrega de dotación personal',
            'Descargar PDF de listas de verificación para el mantenimiento de los computadores',
            'Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica',
            'Ver usuarios eliminados',
            'Disparar evaluación de desempeño',
            'Realizar llamados de atención a trabajadores',
            'Restaurar usuarios eliminados',
            'Ver llamados de atención',
            'Disparar evaluación a proveedores',
            'Enviar evaluación de satisfacción del cliente',
            'Evaluar evaluación de desempeño',
            'Crear proyectos',
            'Editar proyectos',
            'Aprobar proyectos',
            'Crear un entrevista',
            'Lista de solicitudes de empleo',
            'Ver proyectos',
            'Lista de llamados de atención',
            'Responder llamados de atención',
            'Aprobar llamados de atención',
            'Crear clientes',
            'Ver clientes',
            'Eliminar clientes',
            'Ver evaluaciones de satisfacción del cliente',
            'Editar clientes',
            'Crear proveedores',
            'Editar proveedores',
            'Eliminar proveedores',
            'Ver proveedores',
            'Calificar evaluaciones de proveedores',
            'Lista de evaluaciones de proveedores',
            'Ver evaluacioneses de desempeño',
            'Aprobar evaluaciones de desempeño',
            'Calificar evaluaciones de desempeño',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
