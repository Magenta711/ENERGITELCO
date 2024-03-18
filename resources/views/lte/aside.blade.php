f <!-- =============================================== -->
 @php
     function activeMenu($url)
     {
         return request()->is($url) ? 'active' : '';
     }
 @endphp
 <!-- Left side column. contains the sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="pull-left image">
                 <img src="{{ asset('img') }}/{{ Auth::user()->foto }}" class="img-circle" alt="User Image">
             </div>
             <div class="pull-left info">
                 <p>{{ Auth::user()->name }}</p>
                 <a href="#"><i class="fa fa-circle text-success"></i> línea</a>
             </div>
         </div>
         {{-- Menu principal --}}
         <ul class="sidebar-menu" data-widget="tree">
             <li class="header">Menú principal</li>
             <li class="{{ activeMenu('home') }}">
                 <a class="btn-send"href="{{ route('home') }}">
                     <i class="fas fa-home"></i> <span>INICIO</span>
                 </a>
             </li>
             {{-- DIRECCION --}}
             @if (auth()->user()->hasAnyPermission([
                         'Aprobar entrevistas',
                         'Aprobar evaluación de desempeño',
                         'Aprobar hojas de vida',
                         'Aprobar llamados de atención',
                         'Aprobar proyectos',
                         'Aprobar solicitud de entrega de dotación personal',
                         'Aprobar solicitud de Inspección detallada de vehículos',
                         'Aprobar solicitud de Inspección y protección contra caídas',
                         'Aprobar solicitud de lista de verificación para el mantenimiento de computadores',
                         'Aprobar solicitud de permiso laboral o notificación de incapacidad',
                         'Aprobar solicitud de Permisos de trabajo',
                         'Aprobar solicitudes permisos propios',
                         'Aprobar solicitud de Revisión y asignación de herramientas',
                         'Crear proveedores',
                         'Editar proveedores',
                         'Eliminar proveedores',
                         'Lista de proveedores',
                         'Ver proveedores',
                         'Calificar evaluaciones de proveedores',
                         'Disparar evaluación a proveedores',
                         'Eliminar evaluación de proveedores',
                         'Lista de evaluaciones de proveedores',
                         'Ver evaluaciones de proveedores',
                     ]))
                 <li
                     class="treeview {{ activeMenu('tasking*') }}{{ activeMenu('forms*') }}{{ activeMenu('approval*') }}{{ activeMenu('provider*') }}{{ activeMenu('indicators*') }}{{ activeMenu('supplier_evaluation*') }}">
                     <a href="#">
                         <i class="fa fa-user-shield"></i> <span>DIRECCIÓN</span><span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar entrevistas',
                                     'Aprobar evaluación de desempeño',
                                     'Aprobar hojas de vida',
                                     'Aprobar llamados de atención',
                                     'Aprobar proyectos',
                                     'Aprobar solicitud de entrega de dotación personal',
                                     'Aprobar solicitud de Inspección y protección contra caídas',
                                     'Aprobar solicitud de Inspección detallada de vehículos',
                                     'Aprobar solicitud de lista de verificación para el mantenimiento de computadores',
                                     'Aprobar solicitud de permiso laboral o notificación de incapacidad',
                                     'Aprobar solicitud de Permisos de trabajo',
                                     'Aprobar solicitudes permisos propios',
                                     'Aprobar solicitud de Revisión y asignación de herramientas',
                                     'Aprobar reporte de novedades de nómina y horas extras',
                                 ]))
                             <li class="{{ activeMenu('approval*') }}">
                                 <a class="btn-send"href="{{ route('approval') }}"><i class="fa fa-check-square"></i>
                                     <span>APROBACIONES</span><span class="pull-right-container">
                                         <small
                                             class="label pull-right bg-red">{{ session('notificaiones_aprobacion') }}</small>
                                     </span>
                                 </a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de indicadores',
                                     'Crear indicadores',
                                     'Informe de indicadores',
                                     'Seguimiento de indicadores',
                                     'Administración de indicadores',
                                 ]))
                             <li class="{{ activeMenu('indicators*') }}"><a class="btn-send"
                                     href="{{ route('indicators') }}"><i class="fa fa-chart-pie"></i> INDICADORES</a>
                             </li>
                         @endif
                         <li class="hide"><a href="#"><i class="fa fa-shopping-cart"></i> PROCEDIMIENTOS DE
                                 COMPRAS Y ADQUISICIONES</a></li>
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de programaciones en frente de trabajo',
                                     'Ver programaciones en frente de trabajo',
                                     'Crear programacion en frente de trabajo',
                                     'Editar programaciones en frente de trabajo',
                                 ]))
                             <li class="{{ activeMenu('tasking*') }}"><a href="{{ route('tasking') }}"><i
                                         class="fa fa-tasks"></i> FRENTE DE TRABAJO</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de formularios',
                                     'Ver formularios',
                                     'Crear formularios',
                                     'Editar formularios',
                                     'Eliminar formularios',
                                     'Ver respuestas de formularios',
                                 ]))
                             <li class="{{ activeMenu('forms*') }}"><a href="{{ route('forms') }}"><i
                                         class="fab fa-wpforms"></i> FORMULARIOS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Crear proveedores',
                                     'Editar proveedores',
                                     'Eliminar proveedores',
                                     'Lista de proveedores',
                                     'Ver proveedores',
                                     'Calificar evaluaciones de proveedores',
                                     'Disparar evaluación a proveedores',
                                     'Eliminar evaluación de proveedores',
                                     'Lista de evaluaciones de proveedores',
                                     'Ver evaluaciones de proveedores',
                                 ]))
                             <li
                                 class="treeview {{ activeMenu('provider*') }}{{ activeMenu('supplier_evaluation*') }}">
                                 <a href="#"><i class="fa fa-user-tie"></i> PROVEEDORES<span
                                         class="pull-right-container">
                                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
                                 </a>
                                 <ul class="treeview-menu">
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Crear proveedores',
                                                 'Disparar evaluación a proveedores',
                                                 'Editar proveedores',
                                                 'Eliminar proveedores',
                                                 'Lista de proveedores',
                                                 'Ver proveedores',
                                             ]))
                                         <li class="{{ activeMenu('provider*') }}"><a class="btn-send"
                                                 href="{{ route('providers') }}"><i class="fa fa-truck"></i>
                                                 PROVEEDORES</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Calificar evaluaciones de proveedores',
                                                 'Disparar evaluación a proveedores',
                                                 'Eliminar evaluación de proveedores',
                                                 'Lista de evaluaciones de proveedores',
                                                 'Ver evaluaciones de proveedores',
                                             ]))
                                         <li class="{{ activeMenu('supplier_evaluation*') }}"><a class="btn-send"
                                                 href="{{ route('supplier_evaluation') }}"><i
                                                     class="far fa-file-alt"></i> EVALUACIÓN DE PROVEEDORES</a></li>
                                     @endif
                                 </ul>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- MERCADEO Y VENTAS --}}
             <li class="treeview hide">
                 <a href="#"><i class="fa fa-comment-dollar"></i> <span>MERCADEO Y VENTAS</span></a>
             </li>
             {{-- EJECUCION DE LAS OBRAS --}}
             @if (auth()->user()->hasAnyPermission([
                         'Aprobar proyectos',
                         'Crear proyectos',
                         'Editar proyectos',
                         'Lista de proyectos',
                         'Ver proyectos',
                         'Lista de actividades de proyectos',
                         'Ver actividades de proyecto',
                         'Crear actividades de proyecto',
                         'Editar actividades de proyecto',
                         'Lista de consumibles para proyectos',
                         'Ver consumibles para proyectos',
                         'Crear consumibles para proyectos',
                         'Editar consumibles para proyectos',
                         'Lista de materiales para proyectos',
                         'Ver materiales para proyectos',
                         'Crear materiales para proyectos',
                         'Editar materiales para proyectos',
                         'Lista de comisiones para técnicos de proyectos',
                         'Crear comisiones para técnicos de proyectos',
                         'Editar comisiones para técnicos de proyectos',
                         'Lista de comisiones para coordinadores de proyectos',
                         'Crear comisiones de control de proyectos',
                         'Editar comisiones de control de proyectos',
                         'Lista de inventarios de consumibles en bodega',
                         'Crear consumible del inventario',
                         'Editar consumible del inventario',
                         'Ver consumible del inventario',
                         'Eliminar consumible del inventario',
                         'Lista de inventarios de equipos Mintic',
                         'Crear equipo al inventario Mintic',
                         'Editar equipo al inventario Mintic',
                         'Ver equipo al inventario Mintic',
                         'Eliminar equipo al inventario Mintic',
                         'Ver implementación proyectos de MINTIC',
                         'Crear asiganción de implemetación de MINTIC',
                         'Editar asiganción de implemetación de MINTIC',
                         'Ejecutar asiganción de implemetación de MINTIC',
                         'Ver asiganción de implemetación de MINTIC',
                         'Lista de proyectos de MINTIC',
                         'Eliminar asiganción de implemetación de MINTIC',
                         'Lista de paradas de reloj de proyecto MinTIC',
                         'Ver parada de reloj de proyecto MinTIC',
                         'Crear parada de reloj de proyecto MinTIC',
                         'Editar parada de reloj de proyecto MinTIC',
                         'Adjuntar y ver fotos a parada de reloj de proyecto MinTIC',
                         'Exportar parada de reloj de proyecto MinTIC',
                         'Eliminar parada de reloj de proyecto MinTIC',
                         'Lista de mantenimiento de proyecto MinTIC',
                         'Ver mantenimiento de proyecto MinTIC',
                         'Crear mantenimiento de proyecto MinTIC',
                         'Editar mantenimiento de proyecto MinTIC',
                         'Adjuntar y ver fotos a mantenimiento de proyecto MinTIC',
                         'Exportar mantenimiento de proyecto MinTIC',
                         'Eliminar mantenimiento de proyecto MinTIC',
                         'Lista de implementaciones proyectos de MinTIC',
                         'Adjuntar y ver fotos TSS',
                         'Adjuntar y ver fotos de instalación',
                         'Crear kits',
                        'Ver kits',
                        'Editar Kits',
                        'Editar todos los Kits',
                        'Eliminar Kits',
                        'Eliminar todos los Kits',
                        'Ver asignación',
                        'Editar asignación',
                        'Crear asignación',
                        'Revisar asignación',
                        'Ver revisión',
                        'Crear revisión',
                     ]))
                 <li class="treeview {{ activeMenu('execution_works*') }}{{ activeMenu('project*') }}">
                     <a href="#">
                         <i class="fa fa-play"></i> <span>EJECUCIÓN DE OBRAS</span><span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar proyectos',
                                     'Crear proyectos',
                                     'Editar proyectos',
                                     'Lista de proyectos',
                                     'Ver proyectos',
                                     'Lista de actividades de proyectos',
                                     'Ver actividades de proyecto',
                                     'Crear actividades de proyecto',
                                     'Editar actividades de proyecto',
                                     'Lista de consumibles para proyectos',
                                     'Ver consumibles para proyectos',
                                     'Crear consumibles para proyectos',
                                     'Editar consumibles para proyectos',
                                     'Lista de materiales para proyectos',
                                     'Ver materiales para proyectos',
                                     'Crear materiales para proyectos',
                                     'Editar materiales para proyectos',
                                     'Lista de comisiones para técnicos de proyectos',
                                     'Crear comisiones para técnicos de proyectos',
                                     'Editar comisiones para técnicos de proyectos',
                                     'Lista de comisiones para coordinadores de proyectos',
                                     'Crear comisiones de control de proyectos',
                                     'Lista de proyectos de rutas',
                                     'Crear proyectos de rutas',
                                     'Eliminar proyectos de rutas',
                                     'Ver proyectos de rutas',
                                     'Editar proyectos de rutas',
                                     'Aprobar proyectos de rutas',
                                     'Editar comisiones de control de proyectos',
                                     'Lista de inventarios de consumibles en bodega',
                                     'Crear consumible del inventario',
                                     'Editar consumible del inventario',
                                     'Ver consumible del inventario',
                                     'Eliminar consumible del inventario',
                                     'Lista de inventarios de equipos Mintic',
                                     'Crear equipo al inventario Mintic',
                                     'Editar equipo al inventario Mintic',
                                     'Ver equipo al inventario Mintic',
                                     'Eliminar equipo al inventario Mintic',
                                     'Ver implementación proyectos de MINTIC',
                                     'Crear asiganción de implemetación de MINTIC',
                                     'Editar asiganción de implemetación de MINTIC',
                                     'Ejecutar asiganción de implemetación de MINTIC',
                                     'Ver asiganción de implemetación de MINTIC',
                                     'Lista de inventarios de equipos Mintic',
                                     'Crear equipo al inventario Mintic',
                                     'Ver equipo al inventario Mintic',
                                     'Editar equipo al inventario Mintic',
                                     'Eliminar equipo al inventario Mintic',
                                     'Lista de proyectos de MINTIC',
                                     'Eliminar asiganción de implemetación de MINTIC',
                                     'Lista de paradas de reloj de proyecto MinTIC',
                                     'Ver parada de reloj de proyecto MinTIC',
                                     'Crear parada de reloj de proyecto MinTIC',
                                     'Editar parada de reloj de proyecto MinTIC',
                                     'Adjuntar y ver fotos a parada de reloj de proyecto MinTIC',
                                     'Exportar parada de reloj de proyecto MinTIC',
                                     'Eliminar parada de reloj de proyecto MinTIC',
                                     'Lista de mantenimiento de proyecto MinTIC',
                                     'Ver mantenimiento de proyecto MinTIC',
                                     'Crear mantenimiento de proyecto MinTIC',
                                     'Editar mantenimiento de proyecto MinTIC',
                                     'Adjuntar y ver fotos a mantenimiento de proyecto MinTIC',
                                     'Exportar mantenimiento de proyecto MinTIC',
                                     'Eliminar mantenimiento de proyecto MinTIC',
                                     'Lista de implementaciones proyectos de MinTIC',
                                     'Adjuntar y ver fotos TSS',
                                     'Adjuntar y ver fotos de instalación',
                                 ]))
                             <li class="treeview {{ activeMenu('project*') }}">
                                 <a href="#"><i class="fa fa-cubes"></i> PROYECTOS<span
                                         class="pull-right-container">
                                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
                                 </a>
                                 <ul class="treeview-menu">
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Aprobar proyectos',
                                                 'Crear proyectos',
                                                 'Editar proyectos',
                                                 'Lista de proyectos',
                                                 'Ver proyectos',
                                                 'Lista de actividades de proyectos',
                                                 'Ver actividades de proyecto',
                                                 'Crear actividades de proyecto',
                                                 'Editar actividades de proyecto',
                                                 'Lista de consumibles para proyectos',
                                                 'Ver consumibles para proyectos',
                                                 'Crear consumibles para proyectos',
                                                 'Editar consumibles para proyectos',
                                                 'Lista de materiales para proyectos',
                                                 'Ver materiales para proyectos',
                                                 'Crear materiales para proyectos',
                                                 'Editar materiales para proyectos',
                                                 'Lista de comisiones para técnicos de proyectos',
                                                 'Crear comisiones para técnicos de proyectos',
                                                 'Editar comisiones para técnicos de proyectos',
                                                 'Lista de comisiones para coordinadores de proyectos',
                                                 'Crear comisiones de control de proyectos',
                                                 'Lista de proyectos de rutas',
                                                 'Crear proyectos de rutas',
                                                 'Eliminar proyectos de rutas',
                                                 'Ver proyectos de rutas',
                                                 'Editar proyectos de rutas',
                                                 'Aprobar proyectos de rutas',
                                                 'Editar comisiones de control de proyectos',
                                             ]))
                                         <li
                                             class="treeview {{ activeMenu('project/setting*') }}{{ activeMenu('projects*') }}">
                                             <a href="#"><i class="fa fa-satellite-dish"></i> PLANEACIÓN DE
                                                 PROYECTOS<span class="pull-right-container">
                                                     <i class="fa fa-angle-left pull-right"></i>
                                                 </span>
                                             </a>
                                             <ul class="treeview-menu">
                                                 @if (auth()->user()->hasAnyPermission([
                                                             'Aprobar proyectos',
                                                             'Crear proyectos',
                                                             'Editar proyectos',
                                                             'Lista de proyectos',
                                                             'Ver proyectos',
                                                         ]))
                                                     <li class="{{ activeMenu('projects*') }}"><a class="btn-send"
                                                             href="{{ route('project') }}"><i class="fa fa-cubes"></i>
                                                             PROYECTOS</a></li>
                                                 @endif
                                                 @if (auth()->user()->hasAnyPermission([
                                                             'Lista de actividades de proyectos',
                                                             'Ver actividades de proyecto',
                                                             'Crear actividades de proyecto',
                                                             'Editar actividades de proyecto',
                                                             'Lista de consumibles para proyectos',
                                                             'Ver consumibles para proyectos',
                                                             'Crear consumibles para proyectos',
                                                             'Editar consumibles para proyectos',
                                                             'Lista de materiales para proyectos',
                                                             'Ver materiales para proyectos',
                                                             'Crear materiales para proyectos',
                                                             'Editar materiales para proyectos',
                                                             'Lista de comisiones para técnicos de proyectos',
                                                             'Crear comisiones para técnicos de proyectos',
                                                             'Editar comisiones para técnicos de proyectos',
                                                             'Lista de comisiones para coordinadores de proyectos',
                                                             'Crear comisiones de control de proyectos',
                                                             'Editar comisiones de control de proyectos',
                                                         ]))
                                                     <li class="treeview {{ activeMenu('project/setting*') }}">
                                                         <a href="#"><i class="fa fa-cog"></i>
                                                             CONFIGURACIONES<span class="pull-right-container">
                                                                 <i class="fa fa-angle-left pull-right"></i>
                                                             </span>
                                                         </a>
                                                         <ul class="treeview-menu">
                                                             @if (auth()->user()->hasAnyPermission([
                                                                         'Lista de actividades de proyectos',
                                                                         'Ver actividades de proyecto',
                                                                         'Crear actividades de proyecto',
                                                                         'Editar actividades de proyecto',
                                                                     ]))
                                                                 <li
                                                                     class="{{ activeMenu('project/setting/project*') }}">
                                                                     <a class="btn-send"
                                                                         href="{{ route('project_setting') }}"><i
                                                                             class="fa fa-tasks"></i> LISTA DE
                                                                         ACTIVIDADES</a>
                                                                 </li>
                                                             @endif
                                                             @if (auth()->user()->hasAnyPermission([
                                                                         'Lista de consumibles para proyectos',
                                                                         'Ver consumibles para proyectos',
                                                                         'Crear consumibles para proyectos',
                                                                         'Editar consumibles para proyectos',
                                                                     ]))
                                                                 <li
                                                                     class="{{ activeMenu('project/setting/consumables*') }}">
                                                                     <a class="btn-send"
                                                                         href="{{ route('consumables_setting') }}"><i
                                                                             class="fa fa-drumstick-bite"></i>
                                                                         COSUMIBLES</a>
                                                                 </li>
                                                             @endif
                                                             @if (auth()->user()->hasAnyPermission([
                                                                         'Lista de materiales para proyectos',
                                                                         'Ver materiales para proyectos',
                                                                         'Crear materiales para proyectos',
                                                                         'Editar materiales para proyectos',
                                                                     ]))
                                                                 <li
                                                                     class="{{ activeMenu('project/setting/materials*') }}">
                                                                     <a class="btn-send"
                                                                         href="{{ route('materials_setting') }}"><i
                                                                             class="fa fa-toolbox"></i> MATERIALES</a>
                                                                 </li>
                                                             @endif
                                                             @if (auth()->user()->hasAnyPermission([
                                                                         'Lista de comisiones para técnicos de proyectos',
                                                                         'Crear comisiones para técnicos de proyectos',
                                                                         'Editar comisiones para técnicos de proyectos',
                                                                         'Lista de comisiones para coordinadores de proyectos',
                                                                         'Crear comisiones de control de proyectos',
                                                                         'Editar comisiones de control de proyectos',
                                                                     ]))
                                                                 <li
                                                                     class="{{ activeMenu('project/setting/bonuses*') }}">
                                                                     <a class="btn-send"
                                                                         href="{{ route('bonuses_setting') }}"><i
                                                                             class="fa fa-tape"></i> COMISIONES</a>
                                                                 </li>
                                                             @endif
                                                         </ul>
                                                     </li>
                                                 @endif
                                             </ul>
                                         </li>
                                         @if (auth()->user()->hasAnyPermission([
                                                     'Lista de proyectos de rutas',
                                                     'Crear proyectos de rutas',
                                                     'Eliminar proyectos de rutas',
                                                     'Ver proyectos de rutas',
                                                     'Editar proyectos de rutas',
                                                     'Aprobar proyectos de rutas',
                                                 ]))
                                             <li class="{{ activeMenu('project/routes*') }}">
                                                 <a class="btn-send"href="{{ route('routes') }}"><i
                                                         class="fa fa-route"></i> RUTAS TX Y MIGRACIONES Y PRUEBAS</a>
                                             </li>
                                         @endif
                                         @if (auth()->user()->hasAnyPermission([
                                                     'Lista de proyectos de desmonte',
                                                     'Crear proyectos de desmonte',
                                                     'Eliminar proyectos de desmonte',
                                                     'Ver proyectos de desmonte',
                                                     'Editar proyectos de desmonte',
                                                     'Aprobar proyectos de desmonte',
                                                 ]))
                                             <li class="{{ activeMenu('project/clearing*') }}">
                                                 <a class="btn-send"href="{{ route('clearings') }}"><i
                                                         class="fa fa-puzzle-piece"></i> SITE FOLDER PARA REGISTRO DE
                                                     EVIDENCIAS DESMONTE EQUIPOS DE TRANSMISIÓN</a>
                                             </li>
                                         @endif


                                         {{-- @if (auth()->user()->hasAnyPermission([
                                            'Lista de proyectos de desmonte',
                                            'Crear proyectos de desmonte',
                                            'Eliminar proyectos de desmonte',
                                            'Ver proyectos de desmonte',
                                            'Editar proyectos de desmonte',
                                            'Aprobar proyectos de desmonte',
                                        ])) --}}
                                        <li class="treeview {{ activeMenu('project/maintence*') }}">
                                            <a href="#"><i class="fa fa-wifi"></i> MSU<span
                                                    class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                        class="{{ activeMenu('project/maintence/air-conditioning*') }}">
                                                        <a class="btn-send"href="{{ route('air-conditioning_index') }}"><i
                                                                ></i>AIRE</a>
                                            </ul>
                                        </li>
                                        {{-- @endif --}}

                                         @if (auth()->user()->hasAnyPermission([
                                                     'Lista de proyectos de MINTIC',
                                                     'Crear proyectos de MINTIC',
                                                     'Eliminar proyectos de MINTIC',
                                                     'Ver proyectos de MINTIC',
                                                     'Editar proyectos de MINTIC',
                                                     'Aprobar proyectos de MINTIC',
                                                     'Lista de inventarios de consumibles en bodega',
                                                     'Crear consumible del inventario',
                                                     'Editar consumible del inventario',
                                                     'Ver consumible del inventario',
                                                     'Eliminar consumible del inventario',
                                                     'Lista de inventarios de equipos Mintic',
                                                     'Crear equipo al inventario Mintic',
                                                     'Editar equipo al inventario Mintic',
                                                     'Ver equipo al inventario Mintic',
                                                     'Eliminar equipo al inventario Mintic',
                                                     'Ver implementación proyectos de MINTIC',
                                                     'Crear asiganción de implemetación de MINTIC',
                                                     'Editar asiganción de implemetación de MINTIC',
                                                     'Ejecutar asiganción de implemetación de MINTIC',
                                                     'Ver asiganción de implemetación de MINTIC',
                                                     'Eliminar asiganción de implemetación de MINTIC',
                                                     'Lista de paradas de reloj de proyecto MinTIC',
                                                     'Ver parada de reloj de proyecto MinTIC',
                                                     'Crear parada de reloj de proyecto MinTIC',
                                                     'Editar parada de reloj de proyecto MinTIC',
                                                     'Adjuntar y ver fotos a parada de reloj de proyecto MinTIC',
                                                     'Exportar parada de reloj de proyecto MinTIC',
                                                     'Eliminar parada de reloj de proyecto MinTIC',
                                                     'Lista de mantenimiento de proyecto MinTIC',
                                                     'Ver mantenimiento de proyecto MinTIC',
                                                     'Crear mantenimiento de proyecto MinTIC',
                                                     'Editar mantenimiento de proyecto MinTIC',
                                                     'Adjuntar y ver fotos a mantenimiento de proyecto MinTIC',
                                                     'Exportar mantenimiento de proyecto MinTIC',
                                                     'Eliminar mantenimiento de proyecto MinTIC',
                                                     'Lista de implementaciones proyectos de MinTIC',
                                                     'Adjuntar y ver fotos TSS',
                                                     'Adjuntar y ver fotos de instalación',
                                                 ]))
                                             <li class="treeview {{ activeMenu('project/mintic*') }}">
                                                 <a href="#"><i class="fa fa-wifi"></i> MINTIC<span
                                                         class="pull-right-container">
                                                         <i class="fa fa-angle-left pull-right"></i>
                                                     </span>
                                                 </a>
                                                 <ul class="treeview-menu">
                                                     @if (auth()->user()->hasAnyPermission([
                                                                 'Lista de proyectos de MINTIC',
                                                                 'Crear proyectos de MINTIC',
                                                                 'Eliminar proyectos de MINTIC',
                                                                 'Ver proyectos de MINTIC',
                                                                 'Editar proyectos de MINTIC',
                                                                 'Aprobar proyectos de MINTIC',
                                                                 'Ver implementación proyectos de MINTIC',
                                                                 'Crear asiganción de implemetación de MINTIC',
                                                                 'Editar asiganción de implemetación de MINTIC',
                                                                 'Ejecutar asiganción de implemetación de MINTIC',
                                                                 'Ver asiganción de implemetación de MINTIC',
                                                                 'Eliminar asiganción de implemetación de MINTIC',
                                                             ]))
                                                         <li
                                                             class="{{ activeMenu('project/mintic/ec*') }}{{ activeMenu('project/mintic/maintenance*') }}{{ activeMenu('project/mintic/add*') }}">
                                                             <a class="btn-send"href="{{ route('mintic') }}"><i
                                                                     class="fa fa-laptop-house"></i> ESCUELAS</a>
                                                         </li>
                                                     @endif
                                                 </ul>
                                             </li>
                                         @endif
                                     @endif
                                 </ul>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar solicitud de Revisión y asignación de herramientas',
                                     'Consultar revisión y asignación de herramientas',
                                     'Descargar PDF de revisión y asignación de herramientas',
                                     'Digitar formulario de Revisión y asignación de herramientas',
                                     'Eliminar formato de revisión y asignación de herramientas',
                                 ]))
                             <li class="{{ activeMenu('execution_works/review_assignment_tools*') }}"><a
                                     class="btn-send" href="{{ route('review_assignment_tools') }}"><i
                                         class="fa fa-tools"></i> REVISIÓN Y ASIGNACIÓN DE HERRAMIENTA</a></li>
                         @endif
                        @if (auth()->user()->hasAnyPermission([
                            'Crear kits',
                            'Ver kits',
                            'Editar Kits',
                            'Editar todos los Kits',
                            'Eliminar Kits',
                            'Eliminar todos los Kits',
                            'Ver asignación',
                            'Editar asignación',
                            'Crear asignación',
                            'Revisar asignación',
                            'Ver revisión',
                            'Crear revisión'
                        ]))
                            <li class=" {{ activeMenu('execution_works/kits_assignment*') }}">
                                <a class="btn-send" href="{{route('kits_assigment')}}">
                                    <i class="fa fa-toolbox"></i>
                                    KITS
                                </a>
                            </li>
                        @endif

                         @if (auth()->user()->hasAnyPermission([
                                     'Lista inventario de herramientas',
                                     'Editar inventario de herramientas',
                                     'Ver inventario de herramientas',
                                     'Crear inventario de herramientas',
                                     'Eliminar inventario de herramientas',
                                     'Lista de inventarios de consumibles en bodega',
                                     'Crear consumible del inventario',
                                     'Editar consumible del inventario',
                                     'Ver consumible del inventario',
                                     'Eliminar consumible del inventario',
                                     'Lista de inventarios de equipos Mintic',
                                     'Crear equipo al inventario Mintic',
                                     'Editar equipo al inventario Mintic',
                                     'Ver equipo al inventario Mintic',
                                     'Eliminar equipo al inventario Mintic',
                                 ]))
                             <li class="treeview {{ activeMenu('execution_works/inventory*') }}">
                                 <a href="#"><i class="fa fa-border-all"></i> INVENTARIOS<span
                                         class="pull-right-container">
                                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
                                 </a>
                                 <ul class="treeview-menu">
                                     <li class="hide"><a href="#"><i class="fa fa-universal-access"></i>
                                             EQUIPOS DE PROTECCIÓN CONTRA CAÍDAS</a></li>
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista inventario de herramientas',
                                                 'Editar inventario de herramientas',
                                                 'Ver inventario de herramientas',
                                                 'Crear inventario de herramientas',
                                                 'Eliminar inventario de herramientas',
                                             ]))
                                         <li class="{{ activeMenu('execution_works/inventory/tool*') }}"><a
                                                 href="{{ route('inventory_tools') }}"><i class="fa fa-hammer"></i>
                                                 HERRAMIENTAS</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de inventarios de equipos Mintic',
                                                 'Crear equipo al inventario Mintic',
                                                 'Ver equipo al inventario Mintic',
                                                 'Editar equipo al inventario Mintic',
                                                 'Eliminar equipo al inventario Mintic',
                                             ]))
                                         <li class="{{ activeMenu('execution_works/inventory/equipment*') }}"><a
                                                 href="{{ route('mintic_inventory_equipment') }}"><i
                                                     class="fa fa-hdd"></i> EQUIPOS</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de inventarios de consumibles en bodega',
                                                 'Crear consumible del inventario',
                                                 'Ver consumible del inventario',
                                                 'Editar consumible del inventario',
                                                 'Eliminar consumible del inventario',
                                             ]))
                                         <li class="{{ activeMenu('execution_works/inventory/consumable*') }}"><a
                                                 href="{{ route('mintic_inventory_consumables') }}"><i
                                                     class="fa fa-plug"></i> CONSUMIBLES</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Ver inventario de técnicos',
                                                 'Editar inventario de técnicos',
                                                 'Lista de inventario de técnicos',
                                             ]))
                                         <li class="{{ activeMenu('execution_works/inventory/technical*') }}"><a
                                                 href="{{ route('inventary_technical') }}"><i
                                                     class="fas fa-users-cog"></i> TÉCNICOS</a></li>
                                     @endif
                                 </ul>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- SERVICIO AL CLIENTE Y GARANTIAS DE LAS OBRAS --}}
             @if (auth()->user()->hasAnyPermission([
                         'Crear clientes',
                         'Editar clientes',
                         'Eliminar clientes',
                         'Enviar evaluación de satisfacción del cliente',
                         'Lista de clientes',
                         'Ver clientes',
                         'Eliminar evaluación de satisfación de clientes',
                         'Lista de evaluaciones de satisfacción del cliente',
                         'Ver evaluaciones de satisfacción de los clientes',
                     ]))
                 <li class="treeview {{ activeMenu('customer*') }}">
                     <a href="#">
                         <i class="fa fa-street-view"></i> <span>SERVICIO AL CLIENTE Y GARANTIAS DE LAS
                             OBRAS</span><span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Crear clientes',
                                     'Editar clientes',
                                     'Eliminar clientes',
                                     'Enviar evaluación de satisfacción del cliente',
                                     'Lista de clientes',
                                     'Ver clientes',
                                 ]))
                             <li class="{{ activeMenu('customers*') }}"><a class="btn-send"
                                     href="{{ route('customers') }}"><i class="fa fa-user-friends"></i> CLIENTES</a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Eliminar evaluación de satisfación de clientes',
                                     'Lista de evaluaciones de satisfacción del cliente',
                                     'Ver evaluaciones de satisfacción de los clientes',
                                 ]))
                             <li class="{{ activeMenu('customer_satisfaction*') }}"><a class="btn-send"
                                     href="{{ route('customer_satisfaction') }}"><i class="fa fa-child"></i>
                                     EVALUACIONES DE SATISFACCIÓN DE CLIENTES</a></li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- LOGISTICAS E INFRAESTRUCTURA --}}
             @if (auth()->user()->hasAnyPermission([
                         'Aprobar solicitud de Inspección detallada de vehículos',
                         'Consultar inspecciones detalladas de vehículos',
                         'Descargar PDF de inspecciones detalladas de vehículos',
                         'Digitar formulario de inspección detallada de vehículos',
                         'Eliminar formato de inspecciones detalladas de vehículos',
                         'Aprobar solicitud de lista de verificación para el mantenimiento de computadores',
                         'Consultar listas de verificación para el mantenimiento de los computadores',
                         'Descargar PDF de listas de verificación para el mantenimiento de los computadores',
                         'Digitar formulario de lista de verificación para el mantenimiento de computadores',
                         'Eliminar formato de listas de verificación para el mantenimiento de los computadores',
                         'Lista de computadores del inventario',
                         'Crear computadores al inventario',
                         'Ver computadores del inventario',
                         'Editar computadores del inventario',
                         'Eliminar computadores del inventario',
                         'Lista de vehículos del inventario',
                         'Crear vehículos al inventario',
                         'Ver vehículos del inventario',
                         'Editar vehículos del inventario',
                         'Eliminar vehículos del inventario',
                     ]))
                 <li class="treeview {{ activeMenu('logistics_infrastructure*') }}">
                     <a href="#">
                         <i class="fa fa-warehouse"></i>
                         <span>LOGÍSTICA E INFRAESTRUCTURA</span><span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar solicitud de Inspección detallada de vehículos',
                                     'Consultar inspecciones detalladas de vehículos',
                                     'Descargar PDF de inspecciones detalladas de vehículos',
                                     'Digitar formulario de inspección detallada de vehículos',
                                     'Eliminar formato de inspecciones detalladas de vehículos',
                                 ]))
                             <li class="{{ activeMenu('logistics_infrastructure/detailed_inspection_vehicles*') }}"><a
                                     class="btn-send" href="{{ route('detailed_inspection_vehicles') }}"><i
                                         class="fa fa-oil-can"></i> INSPECCIÓN DETALLADA DE VEHÍCULOS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar solicitud de lista de verificación para el mantenimiento de computadores',
                                     'Consultar listas de verificación para el mantenimiento de los computadores',
                                     'Descargar PDF de listas de verificación para el mantenimiento de los computadores',
                                     'Digitar formulario de lista de verificación para el mantenimiento de computadores',
                                     'Eliminar formato de listas de verificación para el mantenimiento de los computadores',
                                 ]))
                             <li class="{{ activeMenu('logistics_infrastructure/checklist_computer_maintenance*') }}">
                                 <a class="btn-send" href="{{ route('checklist_computer_maintenance') }}"><i
                                         class="fa fa-laptop-medical"></i> LISTA DE VERIFICACIÓN DE COMPUTADORES</a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de controles de documentos de conductores',
                                     'Crear controles de documentos de conductores',
                                     'Editar controles de documentos de conductores',
                                     'Ver controles de documentos de conductores',
                                     'Eliminar controles de documentos de conductores',
                                 ]))
                             <li class="{{ activeMenu('logistics_infrastructure/drivers*') }}"><a class="btn-send"
                                     href="{{ route('drivers') }}"><i class="fa fa-id-card"></i> DOCUMENTACIÓN DE
                                     CONDUCTORES</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de caracterización de accidentes de tráncito',
                                     'Crear caracterización de accidentes de tráncito',
                                     'Editar caracterización de accidentes de tráncito',
                                     'Ver caracterización de accidentes de tráncito',
                                     'Eliminar caracterización de accidentes de tráncito',
                                 ]))
                             <li class="{{ activeMenu('logistics_infrastructure/traffic_accident*') }}"><a
                                     class="btn-send" href="{{ route('traffic_accident') }}"><i
                                         class="fa fa-car-crash"></i> ACCIDENTES DE TRÁNSITO</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission(['Lista de cortes de multas', 'Editar cortes de multas', 'Ver cortes de multas']))
                             <li class="{{ activeMenu('logistics_infrastructure/transit_taxes*') }}"><a
                                     class="btn-send" href="{{ route('transit_taxes') }}"><i
                                         class="fa fa-print"></i> MULTAS DE TRÁNSITO</a></li>
                         @endif
                         {{-- <li class="{{ activeMenu('logistics_infrastructure/vehicle_documentation*') }}"><a class="btn-send" href="{{ route('vehicle_documentation') }}"><i class="fa fa-car"></i> REGISTRO DE DOCUMENTACIÓN Y MANTENIMIENTO DE VEHÍCULOS</a></li> --}}
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de computadores del inventario',
                                     'Crear computadores al inventario',
                                     'Ver computadores del inventario',
                                     'Editar computadores del inventario',
                                     'Eliminar computadores del inventario',
                                     'Lista de vehículos del inventario',
                                     'Crear vehículos al inventario',
                                     'Ver vehículos del inventario',
                                     'Editar vehículos del inventario',
                                     'Eliminar vehículos del inventario',
                                 ]))
                             <li
                                 class="treeview {{ activeMenu('logistics_infrastructure/invetory/computer*') }} {{ activeMenu('logistics_infrastructure/invetory/vehicle*') }}">
                                 <a href="#"><i class="fa fa-border-all"></i> INVENTARIOS<span
                                         class="pull-right-container">
                                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
                                 </a>
                                 <ul class="treeview-menu">
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de computadores del inventario',
                                                 'Crear computadores al inventario',
                                                 'Ver computadores del inventario',
                                                 'Editar computadores del inventario',
                                                 'Eliminar computadores del inventario',
                                             ]))
                                         <li class="{{ activeMenu('logistics_infrastructure/invetory/computer*') }}">
                                             <a class="btn-send" href="{{ route('inv_computer') }}"><i
                                                     class="fa fa-desktop"></i> COMPUTADORES</a>
                                         </li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de vehículos del inventario',
                                                 'Crear vehículos al inventario',
                                                 'Ver vehículos del inventario',
                                                 'Editar vehículos del inventario',
                                                 'Eliminar vehículos del inventario',
                                             ]))
                                         <li class="{{ activeMenu('logistics_infrastructure/invetory/vehicle*') }}"><a
                                                 class="btn-send" href="{{ route('inv_vehicle') }}"><i
                                                     class="fa fa-car"></i> VEHÍCULOS</a></li>
                                     @endif
                                 </ul>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- FINANCIERA --}}
             @if (auth()->user()->hasAnyPermission(
                         'Digitar reporte de novedades de nómina y horas extras',
                         'Aprobar reporte de novedades de nómina y horas extras',
                         'Descargar lista de pago de reporte de novedades de nómina y horas extras',
                         'Eliminar formato de reporte de novedades de nómina y horas extras',
                         'Consultar reporte de novedades de nómina y horas extras',
                         'Lista de liquidación de prestaciones sociales',
                         'Crear liquidación de prestaciones sociales',
                         'Ver liquidación de prestaciones sociales',
                         'Editar liquidación de prestaciones sociales',
                         'Descargar liquidación de prestaciones sociales',
                         'Eliminar liquidación de prestaciones sociales',
                         'Digitar prima de servicios',
                         'Aprobar prima de servicios',
                         'Descargar lista de pago de prima de servicios',
                         'Eliminar formato de prima de servicios',
                         'Consultar prima de servicios',
                         'Editar prima de servicios',
                         'Entregar caja menor manual',
                         'Crear corte bonificaciones de permisos de trabajo',
                         'Ver bonificaciones de permisos de trabajo',
                         'Editar bonificaciones de permisos de trabajo',
                         'Exportar bonificaciones de permisos de trabajo',
                         'Aprobar bonificaciones de permisos de trabajo',
                         'Lista de bonificaciones a administrativos y conductores',
                         'Crear bonificaciones a administrativos y conductores',
                         'Ver bonificaciones a administrativos y conductores',
                         'Editar bonificaciones a administrativos y conductores',
                         'Descargar bonificaciones a administrativos y conductores',
                         'Eliminar bonificaciones a administrativos y conductores',
                         'Lista de cuentas de cobro',
                         'Lista de cuentas de cobro propias',
                         'Generar cuenta de cobro abierta',
                         'Crear cuenta de cobro',
                         'Ver cuenta de cobro'))

                 <li class="treeview {{ activeMenu('finances*') }}{{ activeMenu('chargeaccount*') }}">
                     <a href="#">
                         <i class="fa fa-stamp"></i> <span>FINANCIERA</span><span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Digitar reporte de novedades de nómina y horas extras',
                                     'Aprobar reporte de novedades de nómina y horas extras',
                                     'Descargar lista de pago de reporte de novedades de nómina y horas extras',
                                     'Eliminar formato de reporte de novedades de nómina y horas extras',
                                     'Consultar reporte de novedades de nómina y horas extras',
                                 ]))
                             <li class="{{ activeMenu('finances/payroll_overtime_news_report*') }}">
                                 <a class="btn-send" href="{{ route('payroll_overtime_news_report') }}"><i
                                         class="fa fa-user-clock"></i> REPORTE DE NOVEDADES DE NOMINA Y HORAS
                                     EXTRAS</a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de liquidación de prestaciones sociales',
                                     'Crear liquidación de prestaciones sociales',
                                     'Ver liquidación de prestaciones sociales',
                                     'Editar liquidación de prestaciones sociales',
                                     'Descargar liquidación de prestaciones sociales',
                                     'Eliminar liquidación de prestaciones sociales',
                                 ]))
                             <li class="{{ activeMenu('finances/settlement*') }}"><a class="btn-send"
                                     href="{{ route('settlement') }}"><i class="fa fa-money-check-alt"></i>
                                     LIQUIDACIÓN PRESTACIONES SOCIALES</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Digitar prima de servicios',
                                     'Aprobar prima de servicios',
                                     'Descargar lista de pago de prima de servicios',
                                     'Eliminar formato de prima de servicios',
                                     'Consultar prima de servicios',
                                     'Editar prima de servicios',
                                 ]))
                             <li class="{{ activeMenu('finances/premium*') }}"><a class="btn-send"
                                     href="{{ route('premium') }}"><i class="fa fa-file-invoice"></i> PRIMA DE
                                     SERVICIOS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Entregar caja menor manual',
                                     'Crear corte bonificaciones de permisos de trabajo',
                                     'Ver bonificaciones de permisos de trabajo',
                                     'Editar bonificaciones de permisos de trabajo',
                                     'Exportar bonificaciones de permisos de trabajo',
                                     'Aprobar bonificaciones de permisos de trabajo',
                                     'Lista de bonificaciones a administrativos y conductores',
                                     'Crear bonificaciones a administrativos y conductores',
                                     'Ver bonificaciones a administrativos y conductores',
                                     'Editar bonificaciones a administrativos y conductores',
                                     'Descargar bonificaciones a administrativos y conductores',
                                     'Eliminar bonificaciones a administrativos y conductores',
                                     'Lista de cuentas de cobro',
                                     'Lista de cuentas de cobro propias',
                                     'Generar cuenta de cobro abierta',
                                     'Crear cuenta de cobro',
                                     'Ver cuenta de cobro',
                                 ]))
                             <li
                                 class="treeview {{ activeMenu('finances/bonus*') }}{{ activeMenu('finances/viatics*') }}{{ activeMenu('chargeaccount*') }}">
                                 <a href="#"><i class="fa fa-donate"></i> CAJA MENOR Y BONIFICACIONES<span
                                         class="pull-right-container">
                                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
                                 </a>
                                 <ul class="treeview-menu">
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Entregar caja menor manual',
                                                 'Crear corte bonificaciones de permisos de trabajo',
                                                 'Ver bonificaciones de permisos de trabajo',
                                                 'Editar bonificaciones de permisos de trabajo',
                                                 'Exportar bonificaciones de permisos de trabajo',
                                                 'Aprobar bonificaciones de permisos de trabajo',
                                             ]))
                                         <li class="{{ activeMenu('finances/bonus/minor_box*') }}"><a
                                                 class="btn-send" href="{{ route('bonus_minor_box') }}"><i
                                                     class="fa fa-box"></i> CAJA MENOR</a></li>
                                         <li class="{{ activeMenu('finances/viatics/technicals*') }}"><a
                                                 class="btn-send" href="{{ route('work_permit_viatics') }}"><i
                                                     class="fas fa-plane"></i> VÍATICOS</a></li>
                                         <li class="{{ activeMenu('finances/bonus/technicals*') }}"><a
                                                 class="btn-send" href="{{ route('bonuses_technical') }}"><i
                                                     class="fa fa-gift"></i> BONIFICACIONES TÉCNICAS</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de bonificaciones a administrativos y conductores',
                                                 'Crear bonificaciones a administrativos y conductores',
                                                 'Ver bonificaciones a administrativos y conductores',
                                                 'Editar bonificaciones a administrativos y conductores',
                                                 'Descargar bonificaciones a administrativos y conductores',
                                                 'Eliminar bonificaciones a administrativos y conductores',
                                             ]))
                                         <li class="{{ activeMenu('finances/bonus/administratives*') }}"><a
                                                 class="btn-send" href="{{ route('admin_bonuses') }}"><i
                                                     class="fa fa-user-shield"></i> BONIFICACIONES ADMINISTRATIVOS Y
                                                 CONDUCTORES</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de cuentas de cobro',
                                                 'Lista de cuentas de cobro propias',
                                                 'Generar cuenta de cobro abierta',
                                                 'Crear cuenta de cobro',
                                                 'Ver cuenta de cobro',
                                                 'Aprobar cuenta de cobro',
                                                 'Eliminar cuenta de cobro',
                                             ]))
                                         <li class="{{ activeMenu('chargeaccount*') }}"><a class="btn-send"
                                                 href="{{ route('chargeaccount') }}"><i
                                                     class="fa fa-cash-register"></i> CUENTAS DE COBRO</a></li>
                                     @endif
                                 </ul>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- GESTION HUMANA --}}
             @if (auth()->user()->hasAnyPermission([
                         'Aprobar solicitud de permiso laboral o notificación de incapacidad',
                         'Consultar permisos de trabajo',
                         'Descargar PDF de permisos de trabajo',
                         'Digitar formulario de Permisos de trabajo',
                         'Eliminar formato de permisos de trabajo',
                         'Aprobar solicitud de Inspección y protección contra caídas',
                         'Consultar inspecciones de equipos de protección contra caídas',
                         'Descargar PDF de inspecciones de equipos de protección contra caídas',
                         'Digitar formulario de Inspección de equipos de protección contra caídas',
                         'Eliminar formato de inspecciones de equipos de protección contra caídas',
                         'Aprobar solicitud de entrega de dotación personal',
                         'Consultar entrega de dotación personal',
                         'Descargar PDF de entrega de dotación personal',
                         'Digitar formulario de entrega de dotación personal',
                         'Eliminar formato de entrega de dotación personal',
                         'Aprobar solicitud de Permisos de trabajo',
                         'Consultar solicitud de permisos laborales o notificaciones de incapacidad médica',
                         'Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica',
                         'Digitar formulario de solicitud de permiso laboral o notificación de incapacidad',
                         'Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica',
                         'Aprobar evaluación de desempeño',
                         'Calificar evaluaciones de desempeño',
                         'Disparar evaluación de desempeño',
                         'Evaluar evaluaciones de desempeño',
                         'Lista de evaluaciones de desempeño',
                         'Ver evaluaciones de desempeño',
                         'Aprobar llamados de atención',
                         'Editar llamados de atención',
                         'Eliminar llamados de atención',
                         'Lista de llamados de atención',
                         'Realizar llamados de atención a trabajadores',
                         'Responder llamados de atención',
                         'Ver llamados de atención',
                         'Crear memorandos',
                         'Editar memorandos',
                         'Eliminar memorandos',
                         'Lista de memorandos',
                         'Ver memorandos',
                         'Aprobar entrevistas',
                         'Crear entrevistas',
                         'Editar entrevistas',
                         'Eliminar entrevistas',
                         'Lista de entrevista',
                         'Ver entrevistas',
                         'Aprobar hojas de vida',
                         'Crear hojas de vida',
                         'Editar hojas de vida',
                         'Eliminar hojas de vida',
                         'Lista de hojas de vida',
                         'Ver hojas de vida',
                         'Eliminar solicitudes de empleo',
                         'Lista de solicitudes de empleo',
                         'Ver solicitudes de empleo',
                     ]))
                 <li
                     class="treeview {{ activeMenu('human_management*') }}{{ activeMenu('show_called*') }}{{ activeMenu('attention_call*') }}{{ activeMenu('job_application*') }}{{ activeMenu('performance_evaluation*') }}{{ activeMenu('curriculum*') }}">
                     <a href="#">
                         <i class="fa fa-house-user"></i> <span>GESTIÓN HUMANA</span><span
                             class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar solicitud de permiso laboral o notificación de incapacidad',
                                     'Consultar permisos de trabajo',
                                     'Descargar PDF de permisos de trabajo',
                                     'Digitar formulario de Permisos de trabajo',
                                     'Eliminar formato de permisos de trabajo',
                                     'Aprobar solicitud de Inspección y protección contra caídas',
                                     'Consultar inspecciones de equipos de protección contra caídas',
                                     'Descargar PDF de inspecciones de equipos de protección contra caídas',
                                     'Digitar formulario de Inspección de equipos de protección contra caídas',
                                     'Eliminar formato de inspecciones de equipos de protección contra caídas',
                                     'Aprobar solicitud de entrega de dotación personal',
                                     'Consultar entrega de dotación personal',
                                     'Descargar PDF de entrega de dotación personal',
                                     'Digitar formulario de entrega de dotación personal',
                                     'Eliminar formato de entrega de dotación personal',
                                     'Aprobar solicitud de Permisos de trabajo',
                                     'Consultar solicitud de permisos laborales o notificaciones de incapacidad médica',
                                     'Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica',
                                     'Digitar formulario de solicitud de permiso laboral o notificación de incapacidad',
                                     'Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica',
                                 ]))
                             <li
                                 class="treeview {{ activeMenu('human_management/proceeding*') }}{{ activeMenu('human_management/work_permit*') }}{{ activeMenu('human_management/fall_protection_equipment_inspection*') }}{{ activeMenu('human_management/delivery_staffing*') }}{{ activeMenu('human_management/work_permits_notifications_medical_incapacity*') }}{{ activeMenu('human_management/improvement_action*') }}">
                                 <a href="#"><i class="fa fa-file-alt"></i> FORMATOS<span
                                         class="pull-right-container">
                                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
                                 </a>
                                 <ul class="treeview-menu">
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Aprobar solicitud de Permisos de trabajo',
                                                 'Consultar permisos de trabajo',
                                                 'Descargar PDF de permisos de trabajo',
                                                 'Digitar formulario de Permisos de trabajo',
                                                 'Eliminar formato de permisos de trabajo',
                                             ]))
                                         <li class="{{ activeMenu('human_management/work_permit*') }}">
                                             <a class="btn-send" href="{{ route('work_permit') }}"><i
                                                     class="fa fa-running"></i> PERMISOS DE TRABAJO</a>
                                         </li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Aprobar solicitud de Inspección y protección contra caídas',
                                                 'Consultar inspecciones de equipos de protección contra caídas',
                                                 'Descargar PDF de inspecciones de equipos de protección contra caídas',
                                                 'Digitar formulario de Inspección de equipos de protección contra caídas',
                                                 'Eliminar formato de inspecciones de equipos de protección contra caídas',
                                             ]))
                                         <li
                                             class="{{ activeMenu('human_management/fall_protection_equipment_inspection*') }}">
                                             <a class="btn-send"
                                                 href="{{ route('fall_protection_equipment_inspection') }}"><i
                                                     class="fa fa-hiking"></i> INSPECCIÓN DE EQUIPOS DE PROTECCIÓN
                                                 CONTRA CAIDAS</a>
                                         </li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Aprobar solicitud de entrega de dotación personal',
                                                 'Consultar entrega de dotación personal',
                                                 'Descargar PDF de entrega de dotación personal',
                                                 'Digitar formulario de entrega de dotación personal',
                                                 'Eliminar formato de entrega de dotación personal',
                                             ]))
                                         <li class="{{ activeMenu('human_management/delivery_staffing*') }}">
                                             <a class="btn-send" href="{{ route('delivery_staffing') }}"> <i
                                                     class="fa fa-people-arrows"></i> ENTREGA DE DOTACION PERSONA</a>
                                         </li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Aprobar solicitud de permiso laboral o notificación de incapacidad',
                                                 'Consultar solicitud de permisos laborales o notificaciones de incapacidad médica',
                                                 'Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica',
                                                 'Digitar formulario de solicitud de permiso laboral o notificación de incapacidad',
                                                 'Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica',
                                             ]))
                                         <li
                                             class="{{ activeMenu('human_management/work_permits_notifications_medical_incapacity*') }}">
                                             <a class="btn-send"
                                                 href="{{ route('work_permits_notifications_medical_incapacity') }}"><i
                                                     class="fa fa-head-side-cough"></i> SOLICITUD DE PERMISOS
                                                 LABORALES</a>
                                         </li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de actas',
                                                 'Ver actas',
                                                 'Editar actas',
                                                 'Eliminar actas',
                                                 'Descargar actas',
                                                 'Crear actas',
                                             ]))
                                         <li class="{{ activeMenu('human_management/proceeding*') }}"><a
                                                 class="btn-send" href="{{ route('proceeding') }}"><i
                                                     class="fa fa-people-arrows"></i> ACTAS</a></li>
                                     @endif
                                     @if (auth()->user()->hasAnyPermission([
                                                 'Lista de acciones de mejora',
                                                 'Crear acciones de mejora',
                                                 'Ver acciones de mejora',
                                                 'Editar acciones de mejora',
                                                 'Descargar acciones de mejora',
                                                 'Eliminar acciones de mejora',
                                             ]))
                                         <li class="{{ activeMenu('human_management/improvement_action*') }}"><a
                                                 class="btn-send" href="{{ route('improvement_action') }}"><i
                                                     class="far fa-star"></i> ACCIONES DE MEJORA</a></li>
                                     @endif
                                 </ul>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar evaluación de desempeño',
                                     'Calificar evaluaciones de desempeño',
                                     'Disparar evaluación de desempeño',
                                     'Evaluar evaluaciones de desempeño',
                                     'Lista de evaluaciones de desempeño',
                                     'Ver evaluaciones de desempeño',
                                 ]))
                             <li class="{{ activeMenu('performance_evaluation*') }}"><a class="btn-send"
                                     href="{{ route('performance_evaluation') }}"><i
                                         class="fa fa-theater-masks"></i> EVALUACIÓN DE DESEMPEÑO</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar llamados de atención',
                                     'Editar llamados de atención',
                                     'Eliminar llamados de atención',
                                     'Lista de llamados de atención',
                                     'Realizar llamados de atención a trabajadores',
                                     'Responder llamados de atención',
                                     'Ver llamados de atención',
                                 ]))
                             <li class="{{ activeMenu('attention_call*') }} {{ activeMenu('show_called*') }}"> <a
                                     class="btn-send"href="{{ route('attention_call') }}"><i
                                         class="fa fa-gavel"></i> DESCARGOS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Crear memorandos',
                                     'Editar memorandos',
                                     'Eliminar memorandos',
                                     'Lista de memorandos',
                                     'Ver memorandos',
                                 ]))
                             <li class="{{ activeMenu('human_management/memorandum*') }}"> <a
                                     class="btn-send"href="{{ route('memorandum') }}"><i
                                         class="fa fa-book-reader"></i> MEMORANDOS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar entrevistas',
                                     'Crear entrevistas',
                                     'Editar entrevistas',
                                     'Eliminar entrevistas',
                                     'Lista de entrevista',
                                     'Ver entrevistas',
                                 ]))
                             <li class="{{ activeMenu('human_management/interview*') }}"><a class="btn-send"
                                     href="{{ route('interview') }}"><i class="fa fa-file-alt"></i> ENTREVISTAS</a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar hojas de vida',
                                     'Crear hojas de vida',
                                     'Editar hojas de vida',
                                     'Eliminar hojas de vida',
                                     'Lista de hojas de vida',
                                     'Ver hojas de vida',
                                 ]))
                             <li class="{{ activeMenu('curriculum*') }}"><a class="btn-send"
                                     href="{{ route('curriculums') }}"><i class="fa fa-file-signature"></i> HOJAS DE
                                     VIDA</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Eliminar solicitudes de empleo',
                                     'Lista de solicitudes de empleo',
                                     'Ver solicitudes de empleo',
                                 ]))
                             <li class="{{ activeMenu('job_application*') }}"><a class="btn-send"
                                     href="{{ route('job_application') }}"><i class="fa fa-theater-masks"></i>
                                     SOLICITUD DE EMPLEO</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Aprobar retiro de cesantías',
                                     'Consultar retiro de cesantías',
                                     'Digitar solicitud de retiro de cesantías',
                                     'Eliminar solicitud de retiro de cesantías',
                                 ]))
                             <li class="{{ activeMenu('human_management/request_withdraw_severance*') }}"><a
                                     class="btn-send" href="{{ route('request_withdraw_severance') }}"><i
                                         class="fa fa-file-invoice-dollar"></i> SOLICITUDES DE CARTA DE RETIRO DE
                                     CESANTÍAS O LABORAL</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Tomar asistencia',
                                     'Ver asistencia',
                                     'Lista de asistencias',
                                     'Eliminar asistencia',
                                     'Editar asistencia',
                                 ]))
                             <li class="{{ activeMenu('human_management/assistance*') }}"><a class="btn-send"
                                     href="{{ route('assistance') }}"><i class="fa fa-user-check"></i>
                                     ASISTENCIA</a></li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- DOCUMENTOS --}}
             @if (auth()->user()->hasAnyPermission([
                         'Crear documentos',
                         'Descargar documentos',
                         'Editar documentos',
                         'Eliminar documentos',
                         'Lista de documentos',
                         'Ver documentos',
                     ]))
                 <li class="treeview {{ activeMenu('document*') }}">
                     <a href="#"><i class="fa fa-folder"></i> <span>DOCUMENTOS</span><span
                             class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Crear documentos',
                                     'Descargar documentos',
                                     'Editar documentos',
                                     'Eliminar documentos',
                                     'Lista de documentos',
                                     'Ver documentos',
                                 ]))
                             <li class="{{ activeMenu('document*') }}"><a class="btn-send"
                                     href="{{ route('documents') }}"><i class="far fa-file"></i> INTERNOS</a></li>
                         @endif
                         <li class="hide"><a href="#"><i class="fa fa-file"></i> EXTERNOS</a></li>
                     </ul>
                 </li>
             @endif
             {{-- ADMINISTRACION DE USUARIOS --}}
             @if (auth()->user()->hasAnyPermission([
                         'Crear usuarios',
                         'Editar usuarios',
                         'Eliminar usuarios',
                         'Exportar usuarios a excel',
                         'Lista de usuarios',
                         'Ver usuarios',
                         'Restaurar usuarios eliminados',
                         'Ver usuarios eliminados',
                         'Crear roles',
                         'Editar roles',
                         'Eliminar roles',
                         'Lista de roles',
                     ]))
                 <li
                     class="treeview {{ activeMenu('roles*') }} {{ activeMenu('retired*') }} {{ activeMenu('users*') }}">
                     <a href="#">
                         <i class="fa fa-users"></i>
                         <span>ADMINISTRACIÓN DE USUARIOS</span><span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Crear usuarios',
                                     'Editar usuarios',
                                     'Eliminar usuarios',
                                     'Exportar usuarios a excel',
                                     'Lista de usuarios',
                                     'Ver usuarios',
                                 ]))
                             <li class="{{ activeMenu('users*') }}">
                                 <a class="btn-send" href="{{ route('users') }}">
                                     <i class="fa fa-user"></i> USUARIOS
                                 </a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission(['Restaurar usuarios eliminados', 'Ver usuarios eliminados']))
                             <li class="{{ activeMenu('retired*') }}">
                                 <a class="btn-send" href="{{ route('retired_users') }}">
                                     <i class="fa fa-users-slash"></i> USUARIOS RETIRADOS
                                 </a>
                             </li>
                         @endif
                         @if (auth()->user()->hasAnyPermission(['Crear roles', 'Editar roles', 'Eliminar roles', 'Lista de roles']))
                             <li class="{{ activeMenu('roles*') }}">
                                 <a class="btn-send" href="{{ route('roles.index') }}">
                                     <i class="fas fa-user-tag"></i> ROLES Y PERMISOS
                                 </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             {{-- ADMINISTRACION DEL SISTEMA --}}
             @if (auth()->user()->hasAnyPermission([
                         'Configurar cargos',
                         'Configurar mensajes en el sistema',
                         'Crear documentos para la cartelera',
                         'Editar documentos de la cartelera',
                         'Eliminar documentos de la cartelera',
                     ]))
                 <li
                     class="treeview {{ activeMenu('setting/position*') }}{{ activeMenu('learned_lesson*') }}{{ activeMenu('billboard*') }}{{ activeMenu('setting/messages*') }}">
                     <a href="#">
                         <i class="fa fa-tachometer-alt"></i> <span>ADMINISTRACIÓN DEL SISTEMA</span><span
                             class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="hide"><a href="#"><i class="fa fa-map-marker-alt"></i> SEDES</a></li>
                         <li class="hide"><a href="#"><i class="fa fa-wave-square"></i> AREAS</a>,
                             @if ('Configurar cargos')
                                 ])
                         <li class="{{ activeMenu('setting/position*') }}"><a class="btn-send"
                                 href="{{ route('position_setting') }}"><i class="fa fa-user-plus"></i> CARGOS</a>
                         </li>
             @endif
             @if (auth()->user()->hasAnyPermission([
                         'Crear documentos para la cartelera',
                         'Editar documentos de la cartelera',
                         'Eliminar documentos de la cartelera',
                         'Lista de tipos de cartelera',
                         'Crear tipos de cartelera',
                         'Ver tipos de cartelera',
                         'Editar tipos de cartelera',
                         'Eliminar tipos de cartelera',
                     ]))
                 <li class="treeview {{ activeMenu('billboard*') }}">
                     <a href="#"><i class="fa fa-wallet"></i> CARTELERA<span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Crear documentos para la cartelera',
                                     'Editar documentos de la cartelera',
                                     'Eliminar documentos de la cartelera',
                                 ]))
                             <li class="{{ activeMenu('billboards*') }}"><a class="btn-send"
                                     href="{{ route('billboard') }}"><i class="fa fa-folder-open"></i>
                                     DOCUMENTOS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de tipos de cartelera',
                                     'Crear tipos de cartelera',
                                     'Ver tipos de cartelera',
                                     'Editar tipos de cartelera',
                                     'Eliminar tipos de cartelera',
                                 ]))
                             <li class="{{ activeMenu('billboard_type*') }}"><a class="btn-send"
                                     href="{{ route('billboard_type') }}"><i class="fa fa-tags"></i> TIPOS DE
                                     CARTELERAS</a></li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (auth()->user()->hasAnyPermission([
                         'Lista de lesiones aprendidas',
                         'Crear lesiones aprendidas',
                         'Editar lesiones aprendidas',
                         'Eliminar lesiones aprendidas',
                         'Ver lesiones aprendidas',
                         'Lista de preguntas de lesiones aprendidas',
                         'Crear preguntas de lesiones aprendidas',
                         'Editar preguntas de lesiones aprendidas',
                         'Eliminar preguntas de lesiones aprendidas',
                         'Ver preguntas de lesiones aprendidas',
                     ]))
                 <li class="treeview {{ activeMenu('learned_lesson*') }}">
                     <a href="#"><i class="fas fa-user-injured"></i> LESIONES APRENDIDAS<span
                             class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de lesiones aprendidas',
                                     'Crear lesiones aprendidas',
                                     'Editar lesiones aprendidas',
                                     'Eliminar lesiones aprendidas',
                                     'Ver lesiones aprendidas',
                                 ]))
                             <li class="{{ activeMenu('learned_lessons*') }}"><a class="btn-send"
                                     href="{{ route('learned_lessons') }}"><i class="fa fa-crutch"></i>
                                     REGISTROS</a></li>
                         @endif
                         @if (auth()->user()->hasAnyPermission([
                                     'Lista de preguntas de lesiones aprendidas',
                                     'Crear preguntas de lesiones aprendidas',
                                     'Editar preguntas de lesiones aprendidas',
                                     'Eliminar preguntas de lesiones aprendidas',
                                     'Ver preguntas de lesiones aprendidas',
                                 ]))
                             <li class="{{ activeMenu('learned_lesson/test*') }}"><a class="btn-send"
                                     href="{{ route('learned_lessons_test') }}"><i class="fa fa-spell-check"></i>
                                     TEST DE ENTRADA</a></li>
                         @endif
                     </ul>
                 </li>
             @endif
             @can('Configurar mensajes en el sistema')
                 <li class="{{ activeMenu('setting/messages*') }}"><a class="btn-send"
                         href="{{ route('messages') }}"><i class="fa fa-comment-alt"></i> MENSAJES DEL SISTEMA</a></li>
             @endcan
             @can('Configuraciones del sistema')
                 <li><a class="btn-send" href="{{ route('system') }}"><i class="fa fa-mail-bulk"></i> CORREOS</a></li>
             @endcan
             @can('Configuraciones generales')
                 <li><a class="btn-send" href="{{ route('settings') }}"><i class="fa fa-cog"></i> DATOS GENERALES</a>
                 </li>
             @endcan
             <li class="treeview {{ activeMenu('learned_lesson*') }}">
                 <a href="#"><i class="fas fa-user-injured"></i> Modales de entrada<span
                         class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li class="{{ activeMenu('setting/modals*') }}"><a class="btn-send"
                             href="{{ route('setting_modals') }}"><i class="fa fa-spell-check"></i> AJUSTES</a></li>
                     <li class="{{ activeMenu('setting/empleyee_month*') }}"><a class="btn-send"
                             href="{{ route('setting_empleyee_month') }}"><i class="fa fa-spell-check"></i> EMPLEADO
                             DEL MES</a></li>
                 </ul>
             </li>
         </ul>
         </li>
         @endif
         {{-- CVS --}}
         @if (auth()->user()->hasAnyPermission([
                     'CVS Exportar reporte de ventas',
                     'CVS Lista de ventas',
                     'CVS Crear ventas',
                     'CVS Ver ventas',
                     'CVS Finalizar ventas',
                     'CVS Cancelar ventas',
                     'CVS Pagar recibos',
                     'CVS Cancelar ventas',
                     'CVS Ver clientes',
                     'CVS Lista de móviles',
                     'CVS Crear móviles',
                     'CVS Ver móviles',
                     'CVS Editar móviles',
                     'CVS Lista de sim cards',
                     'CVS Crear sim cards',
                     'CVS Ver sim cards',
                     'CVS Editar sim cards',
                     'CVS Lista de accesorios',
                     'CVS Crear accesorios',
                     'CVS Ver accesorios',
                     'CVS Lista de recibos por pagar',
                     'CVS Editar accesorios',
                     'CVS Lista de sedes',
                     'CVS Crear sedes',
                     'CVS Ver sedes',
                     'CVS Editar sedes',
                     'CVS Lista de tipos de sim cards',
                     'CVS Crear tipos de sim cards',
                     'CVS Ver tipos de sim cards',
                     'CVS Editar tipos de sim cards',
                     'CVS Lista de activaciones',
                     'CVS Crear activaciones',
                     'CVS Ver activaciones',
                     'CVS Editar activaciones',
                     'CVS Lista de categoría de accesorios',
                     'CVS Crear categoría de accesorios',
                     'CVS Ver categoría de accesorios',
                     'CVS Editar categoría de accesorios',
                     'CVS Lista de publicidades',
                     'CVS Crear publicidades',
                     'CVS Ver publicidades',
                     'CVS Editar ventas',
                     'CVS Lista de servicios Claro',
                     'CVS Crear servicios Claro',
                     'CVS Ver servicios Claro',
                     'CVS Editar servicios Claro',
                     'CVS Editar publicidades',
                     'CVS Eliminar móviles',
                     'CVS Eliminar sim cards',
                     'CVS Eliminar servicios Claro',
                     'CVS Eliminar accesorios',
                 ]))
             <li class="treeview {{ activeMenu('cvs*') }} {{ activeMenu('cvs*') }} {{ activeMenu('cvs*') }}">
                 <a href="#">
                     <i class="fa fa-store"></i> <span>CVS</span><span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     @if (auth()->user()->hasAnyPermission([
                                 'CVS Lista de ventas',
                                 'CVS Exportar reporte de ventas',
                                 'CVS Crear ventas',
                                 'CVS Ver ventas',
                                 'CVS Editar ventas',
                                 'CVS Finalizar ventas',
                                 'CVS Cancelar ventas',
                             ]))
                         <li class="{{ activeMenu('cvs/sale*') }}"><a class="btn-send"
                                 href="{{ route('cvs_sales') }}"><i class="fa fa-cart-arrow-down"></i> VENTAS</a>
                         </li>
                     @endif
                     @if (auth()->user()->hasAnyPermission(['CVS Lista de recibos por pagar', 'CVS Pagar recibos', 'CVS Cancelar ventas']))
                         <li class="{{ activeMenu('cvs/invoices*') }}"><a class="btn-send"
                                 href="{{ route('cvs_invoices') }}"><i class="fa fa-file-invoice-dollar"></i>
                                 RECIBOS</a></li>
                     @endif
                     @if (auth()->user()->hasAnyPermission(['CVS Lista de clientes', 'CVS Ver clientes']))
                         <li class="{{ activeMenu('cvs/clients*') }}"><a class="btn-send"
                                 href="{{ route('cvs_clients') }}"><i class="fa fa-user-friends"></i> CLIENTES</a>
                         </li>
                     @endif
                     @if (auth()->user()->hasAnyPermission([
                                 'CVS Lista de móviles',
                                 'CVS Crear móviles',
                                 'CVS Ver móviles',
                                 'CVS Editar móviles',
                                 'CVS Lista de sim cards',
                                 'CVS Crear sim cards',
                                 'CVS Ver sim cards',
                                 'CVS Editar sim cards',
                                 'CVS Lista de accesorios',
                                 'CVS Crear accesorios',
                                 'CVS Ver accesorios',
                                 'CVS Lista de servicios Claro',
                                 'CVS Crear servicios Claro',
                                 'CVS Ver servicios Claro',
                                 'CVS Editar servicios Claro',
                                 'CVS Editar accesorios',
                                 'CVS Eliminar móviles',
                                 'CVS Eliminar sim cards',
                                 'CVS Eliminar servicios Claro',
                                 'CVS Eliminar accesorios',
                             ]))
                         <li class="treeview {{ activeMenu('cvs/inventary*') }}">
                             <a href="#">
                                 <i class="fa fa-border-all"></i> <span>PRODUCTOS</span><span
                                     class="pull-right-container">
                                     <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                             </a>
                             <ul class="treeview-menu">
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de móviles',
                                             'CVS Crear móviles',
                                             'CVS Ver móviles',
                                             'CVS Editar móviles',
                                             'CVS Eliminar móviles',
                                         ]))
                                     <li class="{{ activeMenu('cvs/inventary/movile*') }}"><a class="btn-send"
                                             href="{{ route('cvs_inventary_moviles') }}"><i
                                                 class="fa fa-mobile-alt"></i> MÓVILES</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de sim cards',
                                             'CVS Crear sim cards',
                                             'CVS Ver sim cards',
                                             'CVS Editar sim cards',
                                             'CVS Eliminar sim cards',
                                         ]))
                                     <li class="{{ activeMenu('cvs/inventary/sims*') }}"><a class="btn-send"
                                             href="{{ route('cvs_inventary_sims') }}"><i class="fa fa-sim-card"></i>
                                             SIM CARDS</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de accesorios',
                                             'CVS Crear accesorios',
                                             'CVS Ver accesorios',
                                             'CVS Editar accesorios',
                                             'CVS Eliminar servicios Claro',
                                         ]))
                                     <li class="{{ activeMenu('cvs/inventary/Accesories*') }}"><a class="btn-send"
                                             href="{{ route('cvs_inventary_Accesories') }}"><i
                                                 class="fa fa-headphones-alt"></i> ACCESORIOS</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de servicios Claro',
                                             'CVS Crear servicios Claro',
                                             'CVS Ver servicios Claro',
                                             'CVS Editar servicios Claro',
                                             'CVS Eliminar accesorios',
                                         ]))
                                     <li class="{{ activeMenu('cvs/inventary/claro_services*') }}"><a
                                             class="btn-send" href="{{ route('cvs_inventary_claro_services') }}"><i
                                                 class="fa fa-concierge-bell"></i> SERVICIOS CLARO</a></li>
                                 @endif
                             </ul>
                         </li>
                     @endif
                     @if (auth()->user()->hasAnyPermission([
                                 'CVS Lista de sedes',
                                 'CVS Crear sedes',
                                 'CVS Ver sedes',
                                 'CVS Editar sedes',
                                 'CVS Lista de tipos de sim cards',
                                 'CVS Crear tipos de sim cards',
                                 'CVS Ver tipos de sim cards',
                                 'CVS Editar tipos de sim cards',
                                 'CVS Lista de activaciones',
                                 'CVS Crear activaciones',
                                 'CVS Ver activaciones',
                                 'CVS Editar activaciones',
                                 'CVS Lista de categoría de accesorios',
                                 'CVS Crear categoría de accesorios',
                                 'CVS Ver categoría de accesorios',
                                 'CVS Editar categoría de accesorios',
                                 'CVS Lista de publicidades',
                                 'CVS Crear publicidades',
                                 'CVS Ver publicidades',
                                 'CVS Editar publicidades',
                             ]))
                         <li class="treeview {{ activeMenu('cvs/admin*') }}">
                             <a href="#"><i class="fa fa-wallet"></i> ADMINISTRACIÓN<span
                                     class="pull-right-container">
                                     <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                             </a>
                             <ul class="treeview-menu">
                                 @if (auth()->user()->hasAnyPermission(['CVS Lista de sedes', 'CVS Crear sedes', 'CVS Ver sedes', 'CVS Editar sedes']))
                                     <li class="{{ activeMenu('cvs/admin/sedes*') }}"><a class="btn-send"
                                             href="{{ route('cvs_sedes') }}"><i class="fa fa-map-marker-alt"></i>
                                             SEDES</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de tipos de sim cards',
                                             'CVS Crear tipos de sim cards',
                                             'CVS Ver tipos de sim cards',
                                             'CVS Editar tipos de sim cards',
                                         ]))
                                     <li class="{{ activeMenu('cvs/admin/sims_type*') }}"><a class="btn-send"
                                             href="{{ route('cvs_admin_sims_type') }}"><i
                                                 class="fa fa-file-invoice"></i> TIPOS SIM CARDS</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de activaciones',
                                             'CVS Crear activaciones',
                                             'CVS Ver activaciones',
                                             'CVS Editar activaciones',
                                         ]))
                                     <li class="{{ activeMenu('cvs/admin/activation*') }}"><a class="btn-send"
                                             href="{{ route('cvs_admin_activations') }}"><i class="fa fa-star"></i>
                                             ACTIVACIONES</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de categoría de accesorios',
                                             'CVS Crear categoría de accesorios',
                                             'CVS Ver categoría de accesorios',
                                             'CVS Editar categoría de accesorios',
                                         ]))
                                     <li class="{{ activeMenu('cvs/admin/accesories_category*') }}"><a
                                             class="btn-send" href="{{ route('cvs_admin_accesories_category') }}"><i
                                                 class="fa fa-headphones-alt"></i> CATEGORIAS ACESORIOS</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CVS Lista de publicidades',
                                             'CVS Crear publicidades',
                                             'CVS Ver publicidades',
                                             'CVS Editar publicidades',
                                         ]))
                                     <li class="{{ activeMenu('cvs/admin/advertising*') }}"><a class="btn-send"
                                             href="{{ route('cvs_admin_advertising') }}"><i class="fa fa-ad"></i>
                                             PUBLICIDAD</a></li>
                                 @endif
                             </ul>
                         </li>
                     @endif
                 </ul>
             </li>
         @endif
         {{-- CCJL --}}
         @if (auth()->user()->hasAnyPermission([
                     'CCJL Crear rentas',
                     'CCJL Lista de rentas',
                     'CCJL Ver rentas',
                     'CCJL Editar rentas',
                     'CCJL Pagar rentas',
                     'CCJL Recordar pago de rentas',
                     'CCJL Lista de clientes',
                     'CCJL Ver clientes',
                     'CCJL Editar clientes',
                     'CCJL Lista de canons',
                     'CCJL Ver canons',
                     'CCJL Editar canons',
                     'CCJL Crear servicios',
                     'CCJL Lista de servicios',
                     'CCJL Ver servicios',
                     'CCJL Editar servicios',
                     'CCJL Crear administraciones',
                     'CCJL Lista de administraciones',
                     'CCJL Ver administraciones',
                     'CCJL Editar Administraciones',
                 ]))
             <li class="treeview {{ activeMenu('ccjl*') }}">
                 <a href="#">
                     <i class="fa fa-building"></i> <span>CCJL</span><span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     @if (auth()->user()->hasAnyPermission([
                                 'CCJL Lista de rentas',
                                 'CCJL Crear rentas',
                                 'CCJL Ver rentas',
                                 'CCJL Pagar rentas',
                                 'CCJL Recordar pago de rentas',
                                 'CCJL Editar rentas',
                             ]))
                         <li class="{{ activeMenu('ccjl/rent*') }}"><a class="btn-send"
                                 href="{{ route('CCJL_rents') }}"><i class="fa fa-cash-register"></i> RENTAS</a>
                         </li>
                     @endif
                     @if (auth()->user()->hasAnyPermission(['CCJL Lista de clientes', 'CCJL Ver clientes', 'CCJL Editar clientes']))
                         <li class="{{ activeMenu('ccjl/client*') }}"><a class="btn-send"
                                 href="{{ route('CCJL_clients') }}"><i class="fa fa-user-friends"></i> CLIENTES</a>
                         </li>
                     @endif
                     @if (auth()->user()->hasAnyPermission([
                                 'CCJL Lista de canons',
                                 'CCJL Ver canons',
                                 'CCJL Editar canons',
                                 'CCJL Lista de servicios',
                                 'CCJL Crear servicios',
                                 'CCJL Ver servicios',
                                 'CCJL Editar servicios',
                                 'CCJL Lista de administraciones',
                                 'CCJL Crear administraciones',
                                 'CCJL Ver administraciones',
                                 'CCJL Editar Administraciones',
                             ]))
                         <li
                             class="treeview {{ activeMenu('ccjl/local*') }} {{ activeMenu('ccjl/service*') }} {{ activeMenu('ccjl/administration*') }}">
                             <a href="#">
                                 <i class="fa fa-concierge-bell"></i> <span>PRODUCTOS</span><span
                                     class="pull-right-container">
                                     <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                             </a>
                             <ul class="treeview-menu">
                                 @if (auth()->user()->hasAnyPermission(['CCJL Lista de canons', 'CCJL Ver canons', 'CCJL Editar canons']))
                                     <li class="{{ activeMenu('ccjl/local*') }}"><a class="btn-send"
                                             href="{{ route('CCJL_locals') }}"><i class="fa fa-door-closed"></i>
                                             CANON</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CCJL Lista de servicios',
                                             'CCJL Crear servicios',
                                             'CCJL Ver servicios',
                                             'CCJL Editar servicios',
                                         ]))
                                     <li class="{{ activeMenu('ccjl/service*') }}"><a class="btn-send"
                                             href="{{ route('CCJL_services') }}"><i class="fa fa-server"></i>
                                             SERVICIOS</a></li>
                                 @endif
                                 @if (auth()->user()->hasAnyPermission([
                                             'CCJL Lista de administraciones',
                                             'CCJL Crear administraciones',
                                             'CCJL Ver administraciones',
                                             'CCJL Editar Administraciones',
                                         ]))
                                     <li class="{{ activeMenu('ccjl/administration*') }}"><a class="btn-send"
                                             href="{{ route('CCJL_administrations') }}"><i
                                                 class="fa fa-hands-helping"></i> ADMINISTRACIÓN</a></li>
                                 @endif
                             </ul>
                         </li>
                     @endif
                     {{-- REPORTE DE VENTAS --}}
                 </ul>
             </li>
         @endif

         @if (auth()->user()->hasAnyPermission([
                     'CCJL Crear rentas',
                     'CCJL Lista de rentas',
                     'CCJL Ver rentas',
                     'CCJL Editar rentas',
                     'CCJL Pagar rentas',
                     'CCJL Recordar pago de rentas',
                     'CCJL Lista de clientes',
                     'CCJL Ver clientes',
                     'CCJL Editar clientes',
                     'CCJL Lista de canons',
                     'CCJL Ver canons',
                     'CCJL Editar canons',
                     'CCJL Crear servicios',
                     'CCJL Lista de servicios',
                     'CCJL Ver servicios',
                     'CCJL Editar servicios',
                     'CCJL Crear administraciones',
                     'CCJL Lista de administraciones',
                     'CCJL Ver administraciones',
                     'CCJL Editar Administraciones',
                 ]))
         {{-- energias --}}
            <li class="{{ activeMenu('energias*') }}">
                <a class="btn-send"href="{{ route('energy') }}">
                    <i class="fa fa-solar-panel"></i> <span>ENERGIA</span>
                </a>
            </li>
        @endif

         {{-- NOTIFICACIONES --}}
         <li class="{{ activeMenu('notifications*') }}">
             <a class="btn-send"href="{{ route('notifications') }}">
                 <i class="fa fa-bell"></i> <span>NOTIFICACIONES</span>
             </a>
         </li>
         {{-- MI CUENTA --}}
         <li class="treeview {{ activeMenu('profile*') }} {{ activeMenu('carnet*') }}">
             <a href="#">
                 <i class="fa fa-user-circle"></i> <span>MI CUENTA</span><span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
                 <li class="{{ activeMenu('profile*') }}"><a class="btn-send" href="{{ route('profile') }}"><i
                             class="fa fa-user-circle"></i> PERFIL</a></li>
                 <li class="{{ activeMenu('carnet*') }}"><a class="btn-send" href="{{ route('carnet') }}"><i
                             class="fa fa-id-card"></i> CARNET</a></li>
                 {{-- REPORTE DE VENTAS --}}
             </ul>
         </li>
         {{-- CONFIGURACIONES --}}
         <li class="{{ activeMenu('setting*') }}">
             <a class="btn-send"href="{{ route('profile_edit') }}">
                 <i class="fa fa-cogs"></i> <span>CONFIGURACIONES</span>
             </a>
         </li>

         </ul>
     </section>
     <!-- /.sidebar -->
 </aside>
