 <!-- =============================================== -->
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
          <img src="{{asset('img')}}/{{ Auth::user()->foto }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> línea</a>
        </div>
      </div>
      {{-- Menu principal --}}
     <ul class="sidebar-menu" data-widget="tree">
       <li class="header">Menú principal</li>
        <li class="{{ activeMenu('home') }}">
          <a  class="btn-send"href="{{route('home')}}">
            <i class="fas fa-home"></i> <span>INICIO</span>
          </a>
        </li>
        {{-- DIRECCION --}}
        @if (
          auth()->user()->hasPermissionTo('Aprobar entrevistas') ||
          auth()->user()->hasPermissionTo('Aprobar evaluación de desempeño') ||
          auth()->user()->hasPermissionTo('Aprobar hojas de vida') ||
          auth()->user()->hasPermissionTo('Aprobar llamados de atención') ||
          auth()->user()->hasPermissionTo('Aprobar proyectos') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de entrega de dotación personal') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección detallada de vehículos') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de lista de verificación para el mantenimiento de computadores') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Aprobar solicitudes permisos propios') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de Revisión y asignación de herramientas') ||
          auth()->user()->hasPermissionTo('Crear proveedores') ||
          auth()->user()->hasPermissionTo('Editar proveedores') ||
          auth()->user()->hasPermissionTo('Eliminar proveedores') ||
          auth()->user()->hasPermissionTo('Lista de proveedores') ||
          auth()->user()->hasPermissionTo('Ver proveedores') ||
          auth()->user()->hasPermissionTo('Calificar evaluaciones de proveedores') ||
          auth()->user()->hasPermissionTo('Disparar evaluación a proveedores') ||
          auth()->user()->hasPermissionTo('Eliminar evaluación de proveedores') ||
          auth()->user()->hasPermissionTo('Lista de evaluaciones de proveedores') ||
          auth()->user()->hasPermissionTo('Ver evaluaciones de proveedores')
          )
            <li class="treeview {{ activeMenu('tasking*') }}{{ activeMenu('forms*') }}{{ activeMenu('approval*') }}{{ activeMenu('provider*') }}{{ activeMenu('indicators*') }}{{ activeMenu('supplier_evaluation*') }}">
              <a href="#">
                <i class="fa fa-user-shield"></i> <span>DIRECCIÓN</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if (
                    auth()->user()->hasPermissionTo('Aprobar entrevistas') ||
                    auth()->user()->hasPermissionTo('Aprobar evaluación de desempeño') ||
                    auth()->user()->hasPermissionTo('Aprobar hojas de vida') ||
                    auth()->user()->hasPermissionTo('Aprobar llamados de atención') ||
                    auth()->user()->hasPermissionTo('Aprobar proyectos') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de entrega de dotación personal') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección detallada de vehículos') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de lista de verificación para el mantenimiento de computadores') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitudes permisos propios') ||
                    auth()->user()->hasPermissionTo('Aprobar solicitud de Revisión y asignación de herramientas') ||
                    auth()->user()->hasPermissionTo('Aprobar reporte de novedades de nómina y horas extras')
                  )
                    <li class="{{ activeMenu('approval*') }}">
                      <a  class="btn-send"href="{{route('approval')}}"><i class="fa fa-check-square"></i> 
                        <span>APROBACIONES</span><span class="pull-right-container">
                          <small class="label pull-right bg-red">{{session('notificaiones_aprobacion')}}</small>
                        </span>
                      </a>
                    </li>
                @endif
                @if (
                    auth()->user()->hasPermissionTo('Lista de indicadores') ||
                    auth()->user()->hasPermissionTo('Crear indicadores') ||
                    auth()->user()->hasPermissionTo('Informe de indicadores') ||
                    auth()->user()->hasPermissionTo('Seguimiento de indicadores') ||
                    auth()->user()->hasPermissionTo('Administración de indicadores')
                  )
                    <li class="{{ activeMenu('indicators*') }}"><a class="btn-send" href="{{ route('indicators') }}"><i class="fa fa-chart-pie"></i> INDICADORES</a></li>
                @endif
                <li class="hide"><a href="#"><i class="fa fa-shopping-cart"></i> PROCEDIMIENTOS DE  COMPRAS Y ADQUISICIONES</a></li>
                @if (
                  auth()->user()->hasPermissionTo('Lista de programaciones en frente de trabajo') ||
                  auth()->user()->hasPermissionTo('Ver programaciones en frente de trabajo') ||
                  auth()->user()->hasPermissionTo('Crear programacion en frente de trabajo') ||
                  auth()->user()->hasPermissionTo('Editar programaciones en frente de trabajo')
                )
                  <li class="{{ activeMenu('tasking*') }}"><a href="{{route('tasking')}}"><i class="fa fa-tasks"></i> FRENTE DE TRABAJO</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Lista de formularios') ||
                  auth()->user()->hasPermissionTo('Ver formularios') ||
                  auth()->user()->hasPermissionTo('Crear formularios') ||
                  auth()->user()->hasPermissionTo('Editar formularios') ||
                  auth()->user()->hasPermissionTo('Eliminar formularios') ||
                  auth()->user()->hasPermissionTo('Ver respuestas de formularios')
                )
                    <li class="{{ activeMenu('forms*') }}"><a href="{{route('forms')}}"><i class="fab fa-wpforms"></i> FORMULARIOS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Crear proveedores') ||
                  auth()->user()->hasPermissionTo('Editar proveedores') ||
                  auth()->user()->hasPermissionTo('Eliminar proveedores') ||
                  auth()->user()->hasPermissionTo('Lista de proveedores') ||
                  auth()->user()->hasPermissionTo('Ver proveedores') ||
                  auth()->user()->hasPermissionTo('Calificar evaluaciones de proveedores') ||
                  auth()->user()->hasPermissionTo('Disparar evaluación a proveedores') ||
                  auth()->user()->hasPermissionTo('Eliminar evaluación de proveedores') ||
                  auth()->user()->hasPermissionTo('Lista de evaluaciones de proveedores') ||
                  auth()->user()->hasPermissionTo('Ver evaluaciones de proveedores')
                  )
                    <li class="treeview {{ activeMenu('provider*') }}{{ activeMenu('supplier_evaluation*') }}">
                      <a href="#"><i class="fa fa-user-tie"></i> PROVEEDORES<span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        @if (
                          auth()->user()->hasPermissionTo('Crear proveedores') ||
                          auth()->user()->hasPermissionTo('Disparar evaluación a proveedores') ||
                          auth()->user()->hasPermissionTo('Editar proveedores') ||
                          auth()->user()->hasPermissionTo('Eliminar proveedores') ||
                          auth()->user()->hasPermissionTo('Lista de proveedores') ||
                          auth()->user()->hasPermissionTo('Ver proveedores')
                        )
                            <li class="{{ activeMenu('provider*') }}"><a class="btn-send" href="{{ route('providers') }}"><i class="fa fa-truck"></i> PROVEEDORES</a></li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Calificar evaluaciones de proveedores') ||
                          auth()->user()->hasPermissionTo('Disparar evaluación a proveedores') ||
                          auth()->user()->hasPermissionTo('Eliminar evaluación de proveedores') ||
                          auth()->user()->hasPermissionTo('Lista de evaluaciones de proveedores') ||
                          auth()->user()->hasPermissionTo('Ver evaluaciones de proveedores')
                        )
                            <li class="{{ activeMenu('supplier_evaluation*') }}"><a class="btn-send" href="{{route('supplier_evaluation')}}"><i class="far fa-file-alt"></i> EVALUACIÓN DE PROVEEDORES</a></li>
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
        @if (
          auth()->user()->hasPermissionTo('Aprobar proyectos') ||
          auth()->user()->hasPermissionTo('Crear proyectos') ||
          auth()->user()->hasPermissionTo('Editar proyectos') ||
          auth()->user()->hasPermissionTo('Lista de proyectos') ||
          auth()->user()->hasPermissionTo('Ver proyectos') ||
          auth()->user()->hasPermissionTo('Lista de actividades de proyectos') ||
          auth()->user()->hasPermissionTo('Ver actividades de proyecto') ||
          auth()->user()->hasPermissionTo('Crear actividades de proyecto') ||
          auth()->user()->hasPermissionTo('Editar actividades de proyecto') ||
          auth()->user()->hasPermissionTo('Lista de consumibles para proyectos') ||
          auth()->user()->hasPermissionTo('Ver consumibles para proyectos') ||
          auth()->user()->hasPermissionTo('Crear consumibles para proyectos') ||
          auth()->user()->hasPermissionTo('Editar consumibles para proyectos') ||
          auth()->user()->hasPermissionTo('Lista de materiales para proyectos') ||
          auth()->user()->hasPermissionTo('Ver materiales para proyectos') ||
          auth()->user()->hasPermissionTo('Crear materiales para proyectos') ||
          auth()->user()->hasPermissionTo('Editar materiales para proyectos') ||
          auth()->user()->hasPermissionTo('Lista de comisiones para técnicos de proyectos') ||
          auth()->user()->hasPermissionTo('Crear comisiones para técnicos de proyectos') ||
          auth()->user()->hasPermissionTo('Editar comisiones para técnicos de proyectos') ||
          auth()->user()->hasPermissionTo('Lista de comisiones para coordinadores de proyectos') ||
          auth()->user()->hasPermissionTo('Crear comisiones de control de proyectos') ||
          auth()->user()->hasPermissionTo('Editar comisiones de control de proyectos') ||
          auth()->user()->hasPermissionTo('Lista de inventarios de consumibles en bodega') ||
          auth()->user()->hasPermissionTo('Crear consumible del inventario') ||
          auth()->user()->hasPermissionTo('Editar consumible del inventario') ||
          auth()->user()->hasPermissionTo('Ver consumible del inventario') ||
          auth()->user()->hasPermissionTo('Eliminar consumible del inventario') ||
          auth()->user()->hasPermissionTo('Lista de inventarios de equipos Mintic') ||
          auth()->user()->hasPermissionTo('Crear equipo al inventario Mintic') ||
          auth()->user()->hasPermissionTo('Editar equipo al inventario Mintic') ||
          auth()->user()->hasPermissionTo('Ver equipo al inventario Mintic') ||
          auth()->user()->hasPermissionTo('Eliminar equipo al inventario Mintic') ||
          auth()->user()->hasPermissionTo('Ver implementación proyectos de MINTIC') ||
          auth()->user()->hasPermissionTo('Crear asiganción de implemetación de MINTIC') ||
          auth()->user()->hasPermissionTo('Editar asiganción de implemetación de MINTIC') ||
          auth()->user()->hasPermissionTo('Ejecutar asiganción de implemetación de MINTIC') ||
          auth()->user()->hasPermissionTo('Ver asiganción de implemetación de MINTIC') ||
          auth()->user()->hasPermissionTo('Lista de proyectos de MINTIC') ||
          auth()->user()->hasPermissionTo('Eliminar asiganción de implemetación de MINTIC')
        )
          <li class="treeview {{ activeMenu('execution_works*') }}{{ activeMenu('project*') }}">
            <a href="#">
              <i class="fa fa-play"></i> <span>EJECUCIÓN DE OBRAS</span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                @if (
                  auth()->user()->hasPermissionTo('Aprobar proyectos') ||
                  auth()->user()->hasPermissionTo('Crear proyectos') ||
                  auth()->user()->hasPermissionTo('Editar proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de proyectos') ||
                  auth()->user()->hasPermissionTo('Ver proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de actividades de proyectos') ||
                  auth()->user()->hasPermissionTo('Ver actividades de proyecto') ||
                  auth()->user()->hasPermissionTo('Crear actividades de proyecto') ||
                  auth()->user()->hasPermissionTo('Editar actividades de proyecto') ||
                  auth()->user()->hasPermissionTo('Lista de consumibles para proyectos') ||
                  auth()->user()->hasPermissionTo('Ver consumibles para proyectos') ||
                  auth()->user()->hasPermissionTo('Crear consumibles para proyectos') ||
                  auth()->user()->hasPermissionTo('Editar consumibles para proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de materiales para proyectos') ||
                  auth()->user()->hasPermissionTo('Ver materiales para proyectos') ||
                  auth()->user()->hasPermissionTo('Crear materiales para proyectos') ||
                  auth()->user()->hasPermissionTo('Editar materiales para proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de comisiones para técnicos de proyectos') ||
                  auth()->user()->hasPermissionTo('Crear comisiones para técnicos de proyectos') ||
                  auth()->user()->hasPermissionTo('Editar comisiones para técnicos de proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de comisiones para coordinadores de proyectos') ||
                  auth()->user()->hasPermissionTo('Crear comisiones de control de proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de proyectos de rutas') ||
                  auth()->user()->hasPermissionTo('Crear proyectos de rutas') ||
                  auth()->user()->hasPermissionTo('Eliminar proyectos de rutas') ||
                  auth()->user()->hasPermissionTo('Ver proyectos de rutas') ||
                  auth()->user()->hasPermissionTo('Editar proyectos de rutas') ||
                  auth()->user()->hasPermissionTo('Aprobar proyectos de rutas') ||
                  auth()->user()->hasPermissionTo('Editar comisiones de control de proyectos') ||
                  auth()->user()->hasPermissionTo('Lista de inventarios de consumibles en bodega') ||
                  auth()->user()->hasPermissionTo('Crear consumible del inventario') ||
                  auth()->user()->hasPermissionTo('Editar consumible del inventario') ||
                  auth()->user()->hasPermissionTo('Ver consumible del inventario') ||
                  auth()->user()->hasPermissionTo('Eliminar consumible del inventario') ||
                  auth()->user()->hasPermissionTo('Lista de inventarios de equipos Mintic') ||
                  auth()->user()->hasPermissionTo('Crear equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Editar equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Ver equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Eliminar equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Ver implementación proyectos de MINTIC') ||
                  auth()->user()->hasPermissionTo('Crear asiganción de implemetación de MINTIC') ||
                  auth()->user()->hasPermissionTo('Editar asiganción de implemetación de MINTIC') ||
                  auth()->user()->hasPermissionTo('Ejecutar asiganción de implemetación de MINTIC') ||
                  auth()->user()->hasPermissionTo('Ver asiganción de implemetación de MINTIC') ||
                  auth()->user()->hasPermissionTo('Lista de inventarios de equipos Mintic') ||
                  auth()->user()->hasPermissionTo('Crear equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Ver equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Editar equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Eliminar equipo al inventario Mintic') ||
                  auth()->user()->hasPermissionTo('Lista de proyectos de MINTIC') ||
                  auth()->user()->hasPermissionTo('Eliminar asiganción de implemetación de MINTIC')
                )
              <li class="treeview {{ activeMenu('project*') }}">
                <a href="#"><i class="fa fa-cubes"></i> PROYECTOS<span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                    <ul class="treeview-menu">
                      @if (
                        auth()->user()->hasPermissionTo('Aprobar proyectos') ||
                        auth()->user()->hasPermissionTo('Crear proyectos') ||
                        auth()->user()->hasPermissionTo('Editar proyectos') ||
                        auth()->user()->hasPermissionTo('Lista de proyectos') ||
                        auth()->user()->hasPermissionTo('Ver proyectos') ||
                        auth()->user()->hasPermissionTo('Lista de actividades de proyectos') ||
                        auth()->user()->hasPermissionTo('Ver actividades de proyecto') ||
                        auth()->user()->hasPermissionTo('Crear actividades de proyecto') ||
                        auth()->user()->hasPermissionTo('Editar actividades de proyecto') ||
                        auth()->user()->hasPermissionTo('Lista de consumibles para proyectos') ||
                        auth()->user()->hasPermissionTo('Ver consumibles para proyectos') ||
                        auth()->user()->hasPermissionTo('Crear consumibles para proyectos') ||
                        auth()->user()->hasPermissionTo('Editar consumibles para proyectos') ||
                        auth()->user()->hasPermissionTo('Lista de materiales para proyectos') ||
                        auth()->user()->hasPermissionTo('Ver materiales para proyectos') ||
                        auth()->user()->hasPermissionTo('Crear materiales para proyectos') ||
                        auth()->user()->hasPermissionTo('Editar materiales para proyectos') ||
                        auth()->user()->hasPermissionTo('Lista de comisiones para técnicos de proyectos') ||
                        auth()->user()->hasPermissionTo('Crear comisiones para técnicos de proyectos') ||
                        auth()->user()->hasPermissionTo('Editar comisiones para técnicos de proyectos') ||
                        auth()->user()->hasPermissionTo('Lista de comisiones para coordinadores de proyectos') ||
                        auth()->user()->hasPermissionTo('Crear comisiones de control de proyectos') ||
                        auth()->user()->hasPermissionTo('Lista de proyectos de rutas') ||
                        auth()->user()->hasPermissionTo('Crear proyectos de rutas') ||
                        auth()->user()->hasPermissionTo('Eliminar proyectos de rutas') ||
                        auth()->user()->hasPermissionTo('Ver proyectos de rutas') ||
                        auth()->user()->hasPermissionTo('Editar proyectos de rutas') ||
                        auth()->user()->hasPermissionTo('Aprobar proyectos de rutas') ||
                        auth()->user()->hasPermissionTo('Editar comisiones de control de proyectos')
                      )
                        <li class="treeview {{ activeMenu('project/setting*') }}{{ activeMenu('projects*') }}">
                          <a href="#"><i class="fa fa-satellite-dish"></i> PLANEACIÓN DE PROYECTOS<span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            @if (
                                auth()->user()->hasPermissionTo('Aprobar proyectos') ||
                                auth()->user()->hasPermissionTo('Crear proyectos') ||
                                auth()->user()->hasPermissionTo('Editar proyectos') ||
                                auth()->user()->hasPermissionTo('Lista de proyectos') ||
                                auth()->user()->hasPermissionTo('Ver proyectos')
                            )
                                <li class="{{ activeMenu('projects*') }}"><a class="btn-send" href="{{route('project')}}"><i class="fa fa-cubes"></i> PROYECTOS</a></li>
                            @endif
                            @if (
                              auth()->user()->hasPermissionTo('Lista de actividades de proyectos') ||
                              auth()->user()->hasPermissionTo('Ver actividades de proyecto') ||
                              auth()->user()->hasPermissionTo('Crear actividades de proyecto') ||
                              auth()->user()->hasPermissionTo('Editar actividades de proyecto') ||
                              auth()->user()->hasPermissionTo('Lista de consumibles para proyectos') ||
                              auth()->user()->hasPermissionTo('Ver consumibles para proyectos') ||
                              auth()->user()->hasPermissionTo('Crear consumibles para proyectos') ||
                              auth()->user()->hasPermissionTo('Editar consumibles para proyectos') ||
                              auth()->user()->hasPermissionTo('Lista de materiales para proyectos') ||
                              auth()->user()->hasPermissionTo('Ver materiales para proyectos') ||
                              auth()->user()->hasPermissionTo('Crear materiales para proyectos') ||
                              auth()->user()->hasPermissionTo('Editar materiales para proyectos') ||
                              auth()->user()->hasPermissionTo('Lista de comisiones para técnicos de proyectos') ||
                              auth()->user()->hasPermissionTo('Crear comisiones para técnicos de proyectos') ||
                              auth()->user()->hasPermissionTo('Editar comisiones para técnicos de proyectos') ||
                              auth()->user()->hasPermissionTo('Lista de comisiones para coordinadores de proyectos') ||
                              auth()->user()->hasPermissionTo('Crear comisiones de control de proyectos') ||
                              auth()->user()->hasPermissionTo('Editar comisiones de control de proyectos')
                            )
                              <li class="treeview {{ activeMenu('project/setting*') }}">
                                <a href="#"><i class="fa fa-cog"></i> CONFIGURACIONES<span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                  </span>
                                </a>
                                <ul class="treeview-menu">
                                  @if (
                                    auth()->user()->hasPermissionTo('Lista de actividades de proyectos') ||
                                    auth()->user()->hasPermissionTo('Ver actividades de proyecto') ||
                                    auth()->user()->hasPermissionTo('Crear actividades de proyecto') ||
                                    auth()->user()->hasPermissionTo('Editar actividades de proyecto')
                                  )
                                    <li class="{{ activeMenu('project/setting/project*') }}"><a class="btn-send" href="{{route('project_setting')}}"><i class="fa fa-tasks"></i> LISTA DE ACTIVIDADES</a></li>
                                  @endif
                                  @if (
                                    auth()->user()->hasPermissionTo('Lista de consumibles para proyectos') ||
                                    auth()->user()->hasPermissionTo('Ver consumibles para proyectos') ||
                                    auth()->user()->hasPermissionTo('Crear consumibles para proyectos') ||
                                    auth()->user()->hasPermissionTo('Editar consumibles para proyectos')
                                  )
                                      <li class="{{ activeMenu('project/setting/consumables*') }}"><a class="btn-send" href="{{route('consumables_setting')}}"><i class="fa fa-drumstick-bite"></i> COSUMIBLES</a></li>
                                  @endif
                                  @if (
                                    auth()->user()->hasPermissionTo('Lista de materiales para proyectos') ||
                                    auth()->user()->hasPermissionTo('Ver materiales para proyectos') ||
                                    auth()->user()->hasPermissionTo('Crear materiales para proyectos') ||
                                    auth()->user()->hasPermissionTo('Editar materiales para proyectos')
                                  )
                                      <li class="{{ activeMenu('project/setting/materials*') }}"><a class="btn-send" href="{{route('materials_setting')}}"><i class="fa fa-toolbox"></i> MATERIALES</a></li>
                                  @endif
                                  @if (
                                    auth()->user()->hasPermissionTo('Lista de comisiones para técnicos de proyectos') ||
                                    auth()->user()->hasPermissionTo('Crear comisiones para técnicos de proyectos') ||
                                    auth()->user()->hasPermissionTo('Editar comisiones para técnicos de proyectos') ||
                                    auth()->user()->hasPermissionTo('Lista de comisiones para coordinadores de proyectos') ||
                                    auth()->user()->hasPermissionTo('Crear comisiones de control de proyectos') ||
                                    auth()->user()->hasPermissionTo('Editar comisiones de control de proyectos')
                                  )
                                      <li class="{{ activeMenu('project/setting/bonuses*') }}"><a class="btn-send" href="{{route('bonuses_setting')}}"><i class="fa fa-tape"></i> COMISIONES</a></li>
                                  @endif
                                </ul>
                              </li>
                            @endif
                          </ul>
                        </li>
                        @if (
                          auth()->user()->hasPermissionTo('Lista de proyectos de rutas') ||
                          auth()->user()->hasPermissionTo('Crear proyectos de rutas') ||
                          auth()->user()->hasPermissionTo('Eliminar proyectos de rutas') ||
                          auth()->user()->hasPermissionTo('Ver proyectos de rutas') ||
                          auth()->user()->hasPermissionTo('Editar proyectos de rutas') ||
                          auth()->user()->hasPermissionTo('Aprobar proyectos de rutas')
                        )
                            <li class="{{ activeMenu('project/routes*') }}">
                              <a  class="btn-send"href="{{route('routes')}}"><i class="fa fa-route"></i> RUTAS TX Y MIGRACIONES Y  PRUEBAS</a>
                            </li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Lista de proyectos de desmonte') ||
                          auth()->user()->hasPermissionTo('Crear proyectos de desmonte') ||
                          auth()->user()->hasPermissionTo('Eliminar proyectos de desmonte') ||
                          auth()->user()->hasPermissionTo('Ver proyectos de desmonte') ||
                          auth()->user()->hasPermissionTo('Editar proyectos de desmonte') ||
                          auth()->user()->hasPermissionTo('Aprobar proyectos de desmonte')
                        )
                          <li class="{{ activeMenu('project/clearing*') }}">
                            <a  class="btn-send"href="{{ route('clearings') }}"><i class="fa fa-puzzle-piece"></i> SITE FOLDER PARA REGISTRO DE  EVIDENCIAS DESMONTE EQUIPOS DE TRANSMISIÓN</a>
                          </li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Lista de proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Crear proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Eliminar proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Ver proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Editar proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Aprobar proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Lista de inventarios de consumibles en bodega') ||
                          auth()->user()->hasPermissionTo('Crear consumible del inventario') ||
                          auth()->user()->hasPermissionTo('Editar consumible del inventario') ||
                          auth()->user()->hasPermissionTo('Ver consumible del inventario') ||
                          auth()->user()->hasPermissionTo('Eliminar consumible del inventario') ||
                          auth()->user()->hasPermissionTo('Lista de inventarios de equipos Mintic') ||
                          auth()->user()->hasPermissionTo('Crear equipo al inventario Mintic') ||
                          auth()->user()->hasPermissionTo('Editar equipo al inventario Mintic') ||
                          auth()->user()->hasPermissionTo('Ver equipo al inventario Mintic') ||
                          auth()->user()->hasPermissionTo('Eliminar equipo al inventario Mintic') ||
                          auth()->user()->hasPermissionTo('Ver implementación proyectos de MINTIC') ||
                          auth()->user()->hasPermissionTo('Crear asiganción de implemetación de MINTIC') ||
                          auth()->user()->hasPermissionTo('Editar asiganción de implemetación de MINTIC') ||
                          auth()->user()->hasPermissionTo('Ejecutar asiganción de implemetación de MINTIC') ||
                          auth()->user()->hasPermissionTo('Ver asiganción de implemetación de MINTIC') ||
                          auth()->user()->hasPermissionTo('Eliminar asiganción de implemetación de MINTIC')
                        )
                           <li class="treeview {{ activeMenu('project/mintic*') }}">
                              <a href="#"><i class="fa fa-wifi"></i> MINTIC<span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                @if (
                                  auth()->user()->hasPermissionTo('Lista de proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Crear proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Eliminar proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Ver proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Editar proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Aprobar proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Ver implementación proyectos de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Crear asiganción de implemetación de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Editar asiganción de implemetación de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Ejecutar asiganción de implemetación de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Ver asiganción de implemetación de MINTIC') ||
                                  auth()->user()->hasPermissionTo('Eliminar asiganción de implemetación de MINTIC')
                                )
                                    <li class="{{ activeMenu('project/mintic/ec*') }}{{ activeMenu('project/mintic/maintenance*') }}{{ activeMenu('project/mintic/add*') }}">
                                      <a class="btn-send"href="{{ route('mintic') }}"><i class="fa fa-laptop-house"></i> ESCUELAS</a>
                                    </li>
                                @endif
                              </ul>
                           </li>
                        @endif
                      @endif
                    </ul>
                </li>
              @endif  
              @if (
                auth()->user()->hasPermissionTo('Aprobar solicitud de Revisión y asignación de herramientas') ||
                auth()->user()->hasPermissionTo('Consultar revisión y asignación de herramientas') ||
                auth()->user()->hasPermissionTo('Descargar PDF de revisión y asignación de herramientas') ||
                auth()->user()->hasPermissionTo('Digitar formulario de Revisión y asignación de herramientas') ||
                auth()->user()->hasPermissionTo('Eliminar formato de revisión y asignación de herramientas')
              )
                  <li class="{{ activeMenu('execution_works/review_assignment_tools*') }}"><a class="btn-send" href="{{route('review_assignment_tools')}}"><i class="fa fa-tools"></i> REVISIÓN Y ASIGNACIÓN DE  HERRAMIENTA</a></li>
              @endif
              @if (
                    auth()->user()->hasPermissionTo('Lista inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Editar inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Ver inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Crear inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Eliminar inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Lista de inventarios de consumibles en bodega') ||
                    auth()->user()->hasPermissionTo('Crear consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Editar consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Ver consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Eliminar consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Lista de inventarios de equipos Mintic') ||
                    auth()->user()->hasPermissionTo('Crear equipo al inventario Mintic') ||
                    auth()->user()->hasPermissionTo('Editar equipo al inventario Mintic') ||
                    auth()->user()->hasPermissionTo('Ver equipo al inventario Mintic') ||
                    auth()->user()->hasPermissionTo('Eliminar equipo al inventario Mintic')
                  )
              <li class="treeview {{activeMenu('execution_works/inventory*')}}">
                <a href="#"><i class="fa fa-border-all"></i> INVENTARIOS<span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="hide"><a href="#"><i class="fa fa-universal-access"></i> EQUIPOS DE PROTECCIÓN  CONTRA CAÍDAS</a></li>
                  @if (
                    auth()->user()->hasPermissionTo('Lista inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Editar inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Ver inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Crear inventario de herramientas') ||
                    auth()->user()->hasPermissionTo('Eliminar inventario de herramientas')
                  )
                    <li class="{{activeMenu('execution_works/inventory/tool*')}}"><a href="{{route('inventory_tools')}}"><i class="fa fa-hammer"></i> HERRAMIENTAS</a></li>
                  @endif
                  @if (
                    auth()->user()->hasPermissionTo('Lista de inventarios de equipos Mintic') ||
                    auth()->user()->hasPermissionTo('Crear equipo al inventario Mintic') ||
                    auth()->user()->hasPermissionTo('Ver equipo al inventario Mintic') ||
                    auth()->user()->hasPermissionTo('Editar equipo al inventario Mintic') ||
                    auth()->user()->hasPermissionTo('Eliminar equipo al inventario Mintic')
                  )
                      <li class="{{activeMenu('execution_works/inventory/equipment*')}}"><a href="{{route('mintic_inventory_equipment')}}"><i class="fa fa-hdd"></i> EQUIPOS</a></li>
                  @endif
                  @if (
                    auth()->user()->hasPermissionTo('Lista de inventarios de consumibles en bodega') ||
                    auth()->user()->hasPermissionTo('Crear consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Ver consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Editar consumible del inventario') ||
                    auth()->user()->hasPermissionTo('Eliminar consumible del inventario')
                  )
                      <li class="{{activeMenu('execution_works/inventory/consumable*')}}"><a href="{{route('mintic_inventory_consumables')}}"><i class="fa fa-plug"></i> CONSUMIBLES</a></li>
                  @endif
                  @if (
                    auth()->user()->hasPermissionTo('Ver inventario de técnicos') ||
                    auth()->user()->hasPermissionTo('Editar inventario de técnicos') ||
                    auth()->user()->hasPermissionTo('Lista de inventario de técnicos')
                  )
                    <li class="{{activeMenu('execution_works/inventory/technical*')}}"><a href="{{route('inventary_technical')}}"><i class="fas fa-users-cog"></i> TÉCNICOS</a></li>
                  @endif
                </ul>
              </li>
              @endif
            </ul>
          </li>
        @endif
        {{-- SERVICIO AL CLIENTE Y GARANTIAS DE LAS OBRAS --}}
        @if (
          auth()->user()->hasPermissionTo('Crear clientes') ||
          auth()->user()->hasPermissionTo('Editar clientes') ||
          auth()->user()->hasPermissionTo('Eliminar clientes') ||
          auth()->user()->hasPermissionTo('Enviar evaluación de satisfacción del cliente') ||
          auth()->user()->hasPermissionTo('Lista de clientes') ||
          auth()->user()->hasPermissionTo('Ver clientes') ||
          auth()->user()->hasPermissionTo('Eliminar evaluación de satisfación de clientes') ||
          auth()->user()->hasPermissionTo('Lista de evaluaciones de satisfacción del cliente') ||
          auth()->user()->hasPermissionTo('Ver evaluaciones de satisfacción de los clientes')
        )      
              <li class="treeview {{ activeMenu('customer*')}}">
                <a href="#">
                  <i class="fa fa-street-view"></i> <span>SERVICIO AL CLIENTE  Y GARANTIAS DE LAS OBRAS</span><span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  @if (
                    auth()->user()->hasPermissionTo('Crear clientes') ||
                    auth()->user()->hasPermissionTo('Editar clientes') ||
                    auth()->user()->hasPermissionTo('Eliminar clientes') ||
                    auth()->user()->hasPermissionTo('Enviar evaluación de satisfacción del cliente') ||
                    auth()->user()->hasPermissionTo('Lista de clientes') ||
                    auth()->user()->hasPermissionTo('Ver clientes')
                  )
                      <li class="{{ activeMenu('customers*') }}"><a class="btn-send" href="{{route('customers')}}"><i class="fa fa-user-friends"></i> CLIENTES</a></li>
                  @endif
                  @if (
                  auth()->user()->hasPermissionTo('Eliminar evaluación de satisfación de clientes') ||
                  auth()->user()->hasPermissionTo('Lista de evaluaciones de satisfacción del cliente') ||
                  auth()->user()->hasPermissionTo('Ver evaluaciones de satisfacción de los clientes')
                  )
                      <li class="{{ activeMenu('customer_satisfaction*') }}"><a class="btn-send" href="{{ route('customer_satisfaction') }}"><i class="fa fa-child"></i> EVALUACIONES DE  SATISFACCIÓN DE CLIENTES</a></li>
                  @endif
                </ul>
              </li>
        @endif
        {{-- LOGISTICAS E INFRAESTRUCTURA --}}
        @if (
          auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección detallada de vehículos') ||
          auth()->user()->hasPermissionTo('Consultar inspecciones detalladas de vehículos') ||
          auth()->user()->hasPermissionTo('Descargar PDF de inspecciones detalladas de vehículos') ||
          auth()->user()->hasPermissionTo('Digitar formulario de inspección detallada de vehículos') ||
          auth()->user()->hasPermissionTo('Eliminar formato de inspecciones detalladas de vehículos') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de lista de verificación para el mantenimiento de computadores') ||
          auth()->user()->hasPermissionTo('Consultar listas de verificación para el mantenimiento de los computadores') ||
          auth()->user()->hasPermissionTo('Descargar PDF de listas de verificación para el mantenimiento de los computadores') ||
          auth()->user()->hasPermissionTo('Digitar formulario de lista de verificación para el mantenimiento de computadores') ||
          auth()->user()->hasPermissionTo('Eliminar formato de listas de verificación para el mantenimiento de los computadores') ||
          auth()->user()->hasPermissionTo('Lista de computadores del inventario') ||
          auth()->user()->hasPermissionTo('Crear computadores al inventario') ||
          auth()->user()->hasPermissionTo('Ver computadores del inventario') ||
          auth()->user()->hasPermissionTo('Editar computadores del inventario') ||
          auth()->user()->hasPermissionTo('Eliminar computadores del inventario') ||
          auth()->user()->hasPermissionTo('Lista de vehículos del inventario') ||
          auth()->user()->hasPermissionTo('Crear vehículos al inventario') ||
          auth()->user()->hasPermissionTo('Ver vehículos del inventario') ||
          auth()->user()->hasPermissionTo('Editar vehículos del inventario') ||
          auth()->user()->hasPermissionTo('Eliminar vehículos del inventario')
        )
            <li class="treeview {{ activeMenu('logistics_infrastructure/detailed_inspection_vehicles*') }}{{ activeMenu('logistics_infrastructure/checklist_computer_maintenance*') }}{{ activeMenu('invetory/computer*') }}{{ activeMenu('invetory/vehicle*') }}">
              <a href="#">
                <i class="fa fa-warehouse"></i>
                <span>LOGÍSTICA E INFRAESTRUCTURA</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if (
                  auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección detallada de vehículos') ||
                  auth()->user()->hasPermissionTo('Consultar inspecciones detalladas de vehículos') ||
                  auth()->user()->hasPermissionTo('Descargar PDF de inspecciones detalladas de vehículos') ||
                  auth()->user()->hasPermissionTo('Digitar formulario de inspección detallada de vehículos') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de inspecciones detalladas de vehículos')
                )
                    <li class="{{ activeMenu('logistics_infrastructure/detailed_inspection_vehicles*') }}"><a class="btn-send" href="{{route('detailed_inspection_vehicles')}}"><i class="fa fa-oil-can"></i> INSPECCIÓN DETALLADA DE VEHÍCULOS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Aprobar solicitud de lista de verificación para el mantenimiento de computadores') ||
                  auth()->user()->hasPermissionTo('Consultar listas de verificación para el mantenimiento de los computadores') ||
                  auth()->user()->hasPermissionTo('Descargar PDF de listas de verificación para el mantenimiento de los computadores') ||
                  auth()->user()->hasPermissionTo('Digitar formulario de lista de verificación para el mantenimiento de computadores') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de listas de verificación para el mantenimiento de los computadores')
                )
                    <li class="{{ activeMenu('logistics_infrastructure/checklist_computer_maintenance*') }}"><a class="btn-send" href="{{route('checklist_computer_maintenance')}}"><i class="fa fa-laptop-medical"></i> LISTA DE VERIFICACIÓN DE COMPUTADORES</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Lista de computadores del inventario') ||
                  auth()->user()->hasPermissionTo('Crear computadores al inventario') ||
                  auth()->user()->hasPermissionTo('Ver computadores del inventario') ||
                  auth()->user()->hasPermissionTo('Editar computadores del inventario') ||
                  auth()->user()->hasPermissionTo('Eliminar computadores del inventario') ||
                  auth()->user()->hasPermissionTo('Lista de vehículos del inventario') ||
                  auth()->user()->hasPermissionTo('Crear vehículos al inventario') ||
                  auth()->user()->hasPermissionTo('Ver vehículos del inventario') ||
                  auth()->user()->hasPermissionTo('Editar vehículos del inventario') ||
                  auth()->user()->hasPermissionTo('Eliminar vehículos del inventario')
                )
                    <li class="treeview {{ activeMenu('invetory/computer*') }} {{ activeMenu('invetory/vehicle*') }}">
                      <a href="#"><i class="fa fa-border-all"></i> INVENTARIOS<span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        @if (
                          auth()->user()->hasPermissionTo('Lista de computadores del inventario') ||
                          auth()->user()->hasPermissionTo('Crear computadores al inventario') ||
                          auth()->user()->hasPermissionTo('Ver computadores del inventario') ||
                          auth()->user()->hasPermissionTo('Editar computadores del inventario') ||
                          auth()->user()->hasPermissionTo('Eliminar computadores del inventario')
                        )
                            <li class="{{ activeMenu('invetory/computer*') }}"><a class="btn-send" href="{{ route('inv_computer') }}"><i class="fa fa-desktop"></i> COMPUTADORES</a></li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Lista de vehículos del inventario') ||
                          auth()->user()->hasPermissionTo('Crear vehículos al inventario') ||
                          auth()->user()->hasPermissionTo('Ver vehículos del inventario') ||
                          auth()->user()->hasPermissionTo('Editar vehículos del inventario') ||
                          auth()->user()->hasPermissionTo('Eliminar vehículos del inventario')
                        )
                            <li class="{{ activeMenu('invetory/vehicle*') }}"><a class="btn-send" href="{{ route('inv_vehicle') }}"><i class="fa fa-car"></i> VEHÍCULOS</a></li>
                        @endif
                      </ul>
                    </li>
                @endif
              </ul>
            </li>
        @endif
        {{-- GESTION HUMANA --}}
        @if (
          auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
          auth()->user()->hasPermissionTo('Consultar permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Descargar PDF de permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Digitar formulario de Permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Eliminar formato de permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas') ||
          auth()->user()->hasPermissionTo('Consultar inspecciones de equipos de protección contra caídas') ||
          auth()->user()->hasPermissionTo('Descargar PDF de inspecciones de equipos de protección contra caídas') ||
          auth()->user()->hasPermissionTo('Digitar formulario de Inspección de equipos de protección contra caídas') ||
          auth()->user()->hasPermissionTo('Eliminar formato de inspecciones de equipos de protección contra caídas') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de entrega de dotación personal') ||
          auth()->user()->hasPermissionTo('Consultar entrega de dotación personal') ||
          auth()->user()->hasPermissionTo('Descargar PDF de entrega de dotación personal') ||
          auth()->user()->hasPermissionTo('Digitar formulario de entrega de dotación personal') ||
          auth()->user()->hasPermissionTo('Eliminar formato de entrega de dotación personal') ||
          auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica') ||
          auth()->user()->hasPermissionTo('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica') ||
          auth()->user()->hasPermissionTo('Digitar formulario de solicitud de permiso laboral o notificación de incapacidad') ||
          auth()->user()->hasPermissionTo('Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica') ||
          auth()->user()->hasPermissionTo('Aprobar evaluación de desempeño') ||
          auth()->user()->hasPermissionTo('Calificar evaluaciones de desempeño') ||
          auth()->user()->hasPermissionTo('Disparar evaluación de desempeño') ||
          auth()->user()->hasPermissionTo('Evaluar evaluaciones de desempeño') ||
          auth()->user()->hasPermissionTo('Lista de evaluaciones de desempeño') ||
          auth()->user()->hasPermissionTo('Ver evaluaciones de desempeño') ||
          auth()->user()->hasPermissionTo('Aprobar llamados de atención') ||
          auth()->user()->hasPermissionTo('Editar llamados de atención') ||
          auth()->user()->hasPermissionTo('Eliminar llamados de atención') ||
          auth()->user()->hasPermissionTo('Lista de llamados de atención') ||
          auth()->user()->hasPermissionTo('Realizar llamados de atención a trabajadores') ||
          auth()->user()->hasPermissionTo('Responder llamados de atención') ||
          auth()->user()->hasPermissionTo('Ver llamados de atención') ||
          auth()->user()->hasPermissionTo('Crear memorandos') ||
          auth()->user()->hasPermissionTo('Editar memorandos') ||
          auth()->user()->hasPermissionTo('Eliminar memorandos') ||
          auth()->user()->hasPermissionTo('Lista de memorandos') ||
          auth()->user()->hasPermissionTo('Ver memorandos') ||
          auth()->user()->hasPermissionTo('Aprobar entrevistas') ||
          auth()->user()->hasPermissionTo('Crear entrevistas') ||
          auth()->user()->hasPermissionTo('Editar entrevistas')  ||
          auth()->user()->hasPermissionTo('Eliminar entrevistas')  ||
          auth()->user()->hasPermissionTo('Lista de entrevista') ||
          auth()->user()->hasPermissionTo('Ver entrevistas') ||
          auth()->user()->hasPermissionTo('Aprobar hojas de vida') ||
          auth()->user()->hasPermissionTo('Crear hojas de vida') ||
          auth()->user()->hasPermissionTo('Editar hojas de vida') ||
          auth()->user()->hasPermissionTo('Eliminar hojas de vida') ||
          auth()->user()->hasPermissionTo('Lista de hojas de vida') ||
          auth()->user()->hasPermissionTo('Ver hojas de vida') ||
          auth()->user()->hasPermissionTo('Eliminar solicitudes de empleo') ||
          auth()->user()->hasPermissionTo('Lista de solicitudes de empleo') ||
          auth()->user()->hasPermissionTo('Exportar bonificaciones de permisos de trabajo') ||
          auth()->user()->hasPermissionTo('Ver solicitudes de empleo') ||
          auth()->user()->hasPermissionTo('Digitar reporte de novedades de nómina y horas extras') ||
          auth()->user()->hasPermissionTo('Aprobar reporte de novedades de nómina y horas extras') ||
          auth()->user()->hasPermissionTo('Descargar lista de pago de reporte de novedades de nómina y horas extras') ||
          auth()->user()->hasPermissionTo('Eliminar formato de reporte de novedades de nómina y horas extras') ||
          auth()->user()->hasPermissionTo('Consultar reporte de novedades de nómina y horas extras')
        )
            <li class="treeview {{ activeMenu('human_management*') }}{{ activeMenu('show_called*') }}{{ activeMenu('attention_call*') }}{{ activeMenu('job_application*') }}{{ activeMenu('interview*') }}{{ activeMenu('performance_evaluation*') }}{{ activeMenu('memorandum*') }}{{ activeMenu('curriculum*') }}">
              <a href="#">
                <i class="fa fa-house-user"></i> <span>GESTIÓN HUMANA</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if (
                  auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
                  auth()->user()->hasPermissionTo('Consultar permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Descargar PDF de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Digitar formulario de Permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas') ||
                  auth()->user()->hasPermissionTo('Consultar inspecciones de equipos de protección contra caídas') ||
                  auth()->user()->hasPermissionTo('Descargar PDF de inspecciones de equipos de protección contra caídas') ||
                  auth()->user()->hasPermissionTo('Digitar formulario de Inspección de equipos de protección contra caídas') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de inspecciones de equipos de protección contra caídas') ||
                  auth()->user()->hasPermissionTo('Aprobar solicitud de entrega de dotación personal') ||
                  auth()->user()->hasPermissionTo('Consultar entrega de dotación personal') ||
                  auth()->user()->hasPermissionTo('Descargar PDF de entrega de dotación personal') ||
                  auth()->user()->hasPermissionTo('Digitar formulario de entrega de dotación personal') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de entrega de dotación personal') ||
                  auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica') ||
                  auth()->user()->hasPermissionTo('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica') ||
                  auth()->user()->hasPermissionTo('Digitar formulario de solicitud de permiso laboral o notificación de incapacidad') ||
                  auth()->user()->hasPermissionTo('Exportar bonificaciones de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica') ||
                  auth()->user()->hasPermissionTo('Digitar reporte de novedades de nómina y horas extras') ||
                  auth()->user()->hasPermissionTo('Aprobar reporte de novedades de nómina y horas extras') ||
                  auth()->user()->hasPermissionTo('Descargar lista de pago de reporte de novedades de nómina y horas extras') ||
                  auth()->user()->hasPermissionTo('Eliminar formato de reporte de novedades de nómina y horas extras') ||
                  auth()->user()->hasPermissionTo('Consultar reporte de novedades de nómina y horas extras')
                )
                    <li class="treeview {{ activeMenu('human_management/proceeding*') }}{{ activeMenu('human_management/work_permit*') }}{{ activeMenu('human_management/fall_protection_equipment_inspection*') }}{{ activeMenu('human_management/delivery_staffing*') }}{{ activeMenu('human_management/work_permits_notifications_medical_incapacity*') }}{{ activeMenu('human_management/payroll_overtime_news_report*') }}{{ activeMenu('human_management/settlement*') }}{{activeMenu('human_management/improvement_action*')}}">
                      <a href="#"><i class="fa fa-file-alt"></i> FORMATOS<span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        @if (
                          auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') ||
                          auth()->user()->hasPermissionTo('Consultar permisos de trabajo') ||
                          auth()->user()->hasPermissionTo('Descargar PDF de permisos de trabajo') ||
                          auth()->user()->hasPermissionTo('Digitar formulario de Permisos de trabajo') ||
                          auth()->user()->hasPermissionTo('Exportar bonificaciones de permisos de trabajo') ||
                          auth()->user()->hasPermissionTo('Eliminar formato de permisos de trabajo')
                        )
                            <li class="{{ activeMenu('human_management/work_permit*') }}">
                              <a class="btn-send" href="{{route('work_permit')}}"><i class="fa fa-running"></i> PERMISOS DE TRABAJO</a>
                            </li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas') ||
                          auth()->user()->hasPermissionTo('Consultar inspecciones de equipos de protección contra caídas') ||
                          auth()->user()->hasPermissionTo('Descargar PDF de inspecciones de equipos de protección contra caídas') ||
                          auth()->user()->hasPermissionTo('Digitar formulario de Inspección de equipos de protección contra caídas') ||
                          auth()->user()->hasPermissionTo('Eliminar formato de inspecciones de equipos de protección contra caídas')
                        )
                            <li class="{{ activeMenu('human_management/fall_protection_equipment_inspection*') }}">
                              <a class="btn-send" href="{{route('fall_protection_equipment_inspection')}}"><i class="fa fa-hiking"></i> INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA CAIDAS</a>
                            </li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Aprobar solicitud de entrega de dotación personal') ||
                          auth()->user()->hasPermissionTo('Consultar entrega de dotación personal') ||
                          auth()->user()->hasPermissionTo('Descargar PDF de entrega de dotación personal') ||
                          auth()->user()->hasPermissionTo('Digitar formulario de entrega de dotación personal') ||
                          auth()->user()->hasPermissionTo('Eliminar formato de entrega de dotación personal')
                        )
                            <li class="{{ activeMenu('human_management/delivery_staffing*') }}">
                              <a class="btn-send" href="{{route('delivery_staffing')}}"> <i class="fa fa-people-arrows"></i> ENTREGA DE DOTACION PERSONA</a>
                            </li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
                          auth()->user()->hasPermissionTo('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica') ||
                          auth()->user()->hasPermissionTo('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica') ||
                          auth()->user()->hasPermissionTo('Digitar formulario de solicitud de permiso laboral o notificación de incapacidad') ||
                          auth()->user()->hasPermissionTo('Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica')
                        )
                            <li class="{{ activeMenu('human_management/work_permits_notifications_medical_incapacity*') }}">
                              <a class="btn-send" href="{{route('work_permits_notifications_medical_incapacity')}}"><i class="fa fa-head-side-cough"></i> SOLICITUD DE PERMISOS LABORALES</a>
                            </li>
                        @endif
                        @if (
                            auth()->user()->hasPermissionTo('Digitar reporte de novedades de nómina y horas extras') ||
                            auth()->user()->hasPermissionTo('Aprobar reporte de novedades de nómina y horas extras') ||
                            auth()->user()->hasPermissionTo('Descargar lista de pago de reporte de novedades de nómina y horas extras') ||
                            auth()->user()->hasPermissionTo('Eliminar formato de reporte de novedades de nómina y horas extras') ||
                            auth()->user()->hasPermissionTo('Consultar reporte de novedades de nómina y horas extras')
                          )
                          <li class="{{ activeMenu('human_management/payroll_overtime_news_report*') }}">
                            <a class="btn-send" href="{{route('payroll_overtime_news_report')}}"><i class="fa fa-user-clock"></i> REPORTE DE NOVEDADES DE  NOMINA Y HORAS EXTRAS</a>
                          </li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Lista de actas') ||
                          auth()->user()->hasPermissionTo('Ver actas') ||
                          auth()->user()->hasPermissionTo('Editar actas') ||
                          auth()->user()->hasPermissionTo('Eliminar actas') ||
                          auth()->user()->hasPermissionTo('Descargar actas') ||
                          auth()->user()->hasPermissionTo('Crear actas')
                        )
                            <li class="{{ activeMenu('human_management/proceeding*') }}"><a class="btn-send" href="{{route('proceeding')}}"><i class="fa fa-people-arrows"></i> ACTAS</a></li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Lista de liquidación de prestaciones sociales') ||
                          auth()->user()->hasPermissionTo('Crear liquidación de prestaciones sociales') ||
                          auth()->user()->hasPermissionTo('Ver liquidación de prestaciones sociales') ||
                          auth()->user()->hasPermissionTo('Editar liquidación de prestaciones sociales') ||
                          auth()->user()->hasPermissionTo('Descargar liquidación de prestaciones sociales') ||
                          auth()->user()->hasPermissionTo('Eliminar liquidación de prestaciones sociales')
                        )
                          <li class="{{ activeMenu('human_management/settlement*') }}"><a class="btn-send" href="{{route('settlement')}}"><i class="fa fa-money-check-alt"></i> LIQUIDACIÓN PRESTACIONES SOCIALES</a></li>
                        @endif
                        @if (
                          auth()->user()->hasPermissionTo('Lista de acciones de mejora') ||
                          auth()->user()->hasPermissionTo('Crear acciones de mejora') ||
                          auth()->user()->hasPermissionTo('Ver acciones de mejora') ||
                          auth()->user()->hasPermissionTo('Editar acciones de mejora') ||
                          auth()->user()->hasPermissionTo('Descargar acciones de mejora') ||
                          auth()->user()->hasPermissionTo('Eliminar acciones de mejora')
                        )
                          <li class="{{ activeMenu('human_management/improvement_action*') }}"><a class="btn-send" href="{{route('improvement_action')}}"><i class="far fa-star"></i> ACCIONES DE MEJORA</a></li>
                        @endif
                      </ul>
                    </li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Entregar caja menor manual') ||
                  auth()->user()->hasPermissionTo('Crear corte bonificaciones de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Ver bonificaciones de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Editar bonificaciones de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Exportar bonificaciones de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Aprobar bonificaciones de permisos de trabajo') ||
                  auth()->user()->hasPermissionTo('Lista de bonificaciones a administrativos y conductores') ||
                  auth()->user()->hasPermissionTo('Crear bonificaciones a administrativos y conductores') ||
                  auth()->user()->hasPermissionTo('Ver bonificaciones a administrativos y conductores') ||
                  auth()->user()->hasPermissionTo('Editar bonificaciones a administrativos y conductores') ||
                  auth()->user()->hasPermissionTo('Descargar bonificaciones a administrativos y conductores') ||
                  auth()->user()->hasPermissionTo('Eliminar bonificaciones a administrativos y conductores')
                )
                    <li class="treeview {{ activeMenu('human_management/bonus*') }}"
                          >
                          <a href="#"><i class="fa fa-donate"></i> CAJA MENOR Y BONIFICACIONES<span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            {{-- <li class="{{ activeMenu('human_management/bonus/general*') }}"><a class="btn-send" href="{{route('work_permit_bonuses')}}"><i class="fa fa-theater-masks"></i> GENERAL</a></li> --}}
                            @if (
                              auth()->user()->hasPermissionTo('Entregar caja menor manual') ||
                              auth()->user()->hasPermissionTo('Crear corte bonificaciones de permisos de trabajo') ||
                              auth()->user()->hasPermissionTo('Ver bonificaciones de permisos de trabajo') ||
                              auth()->user()->hasPermissionTo('Editar bonificaciones de permisos de trabajo') ||
                              auth()->user()->hasPermissionTo('Exportar bonificaciones de permisos de trabajo') ||
                              auth()->user()->hasPermissionTo('Aprobar bonificaciones de permisos de trabajo')
                            )
                              <li class="{{ activeMenu('human_management/bonus/minor_box*') }}"><a class="btn-send" href="{{route('bonus_minor_box')}}"><i class="fa fa-box"></i> CAJA MENOR</a></li>
                              <li class="{{ activeMenu('human_management/bonus/technicals*') }}"><a class="btn-send" href="{{route('work_permit_bonuses')}}"><i class="fa fa-gift"></i> BONIFICACIONES TÉCNICOS</a></li>
                            @endif
                            {{-- <li class="{{ activeMenu('human_management/bonus/drivers*') }}"><a class="btn-send" href="{{route('performance_evaluation')}}"><i class="fa fa-theater-masks"></i> BONIFICACIONES CONDUTORES</a></li> --}}
                            @if (
                              auth()->user()->hasPermissionTo('Lista de bonificaciones a administrativos y conductores') ||
                              auth()->user()->hasPermissionTo('Crear bonificaciones a administrativos y conductores') ||
                              auth()->user()->hasPermissionTo('Ver bonificaciones a administrativos y conductores') ||
                              auth()->user()->hasPermissionTo('Editar bonificaciones a administrativos y conductores') ||
                              auth()->user()->hasPermissionTo('Descargar bonificaciones a administrativos y conductores') ||
                              auth()->user()->hasPermissionTo('Eliminar bonificaciones a administrativos y conductores')
                            )
                                <li class="{{ activeMenu('human_management/bonus/administratives*') }}"><a class="btn-send" href="{{route('admin_bonuses')}}"><i class="fa fa-theater-masks"></i> BONIFICACIONES ADMINISTRATIVOS Y CONDUCTORES</a></li>
                            @endif
                          </ul>
                    </li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Aprobar evaluación de desempeño') ||
                  auth()->user()->hasPermissionTo('Calificar evaluaciones de desempeño') ||
                  auth()->user()->hasPermissionTo('Disparar evaluación de desempeño') ||
                  auth()->user()->hasPermissionTo('Evaluar evaluaciones de desempeño') ||
                  auth()->user()->hasPermissionTo('Lista de evaluaciones de desempeño') ||
                  auth()->user()->hasPermissionTo('Ver evaluaciones de desempeño')
                )
                    <li class="{{ activeMenu('performance_evaluation*') }}"><a class="btn-send" href="{{route('performance_evaluation')}}"><i class="fa fa-theater-masks"></i> EVALUACIÓN DE DESEMPEÑO</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Aprobar llamados de atención') ||
                  auth()->user()->hasPermissionTo('Editar llamados de atención') ||
                  auth()->user()->hasPermissionTo('Eliminar llamados de atención') ||
                  auth()->user()->hasPermissionTo('Lista de llamados de atención') ||
                  auth()->user()->hasPermissionTo('Realizar llamados de atención a trabajadores') ||
                  auth()->user()->hasPermissionTo('Responder llamados de atención') ||
                  auth()->user()->hasPermissionTo('Ver llamados de atención')
                )
                  <li class="{{ activeMenu('attention_call*')}} {{ activeMenu('show_called*') }}"> <a  class="btn-send"href="{{route('attention_call')}}"><i class="fa fa-gavel"></i> DESCARGOS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Crear memorandos') ||
                  auth()->user()->hasPermissionTo('Editar memorandos') ||
                  auth()->user()->hasPermissionTo('Eliminar memorandos') ||
                  auth()->user()->hasPermissionTo('Lista de memorandos') ||
                  auth()->user()->hasPermissionTo('Ver memorandos')
                )
                    <li class="{{ activeMenu('memorandum*')}}"> <a  class="btn-send"href="{{route('memorandum')}}"><i class="fa fa-book-reader"></i> MEMORANDOS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Aprobar entrevistas') ||
                  auth()->user()->hasPermissionTo('Crear entrevistas') ||
                  auth()->user()->hasPermissionTo('Editar entrevistas')  ||
                  auth()->user()->hasPermissionTo('Eliminar entrevistas')  ||
                  auth()->user()->hasPermissionTo('Lista de entrevista') ||
                  auth()->user()->hasPermissionTo('Ver entrevistas')
                )
                    <li class="{{ activeMenu('interview*') }}"><a class="btn-send" href="{{ route('interview') }}"><i class="fa fa-file-alt"></i> ENTREVISTAS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Aprobar hojas de vida') ||
                  auth()->user()->hasPermissionTo('Crear hojas de vida') ||
                  auth()->user()->hasPermissionTo('Editar hojas de vida') ||
                  auth()->user()->hasPermissionTo('Eliminar hojas de vida') ||
                  auth()->user()->hasPermissionTo('Lista de hojas de vida') ||
                  auth()->user()->hasPermissionTo('Ver hojas de vida')
                )
                    <li class="{{ activeMenu('curriculum*') }}"><a class="btn-send" href="{{ route('curriculums') }}"><i class="fa fa-file-signature"></i> HOJAS DE VIDA</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Eliminar solicitudes de empleo') ||
                  auth()->user()->hasPermissionTo('Lista de solicitudes de empleo') ||
                  auth()->user()->hasPermissionTo('Ver solicitudes de empleo')
                )
                    <li class="{{ activeMenu('job_application*') }}"><a class="btn-send" href="{{route('job_application')}}"><i class="fa fa-theater-masks"></i> SOLICITUD DE EMPLEO</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Aprobar retiro de cesantías') ||
                  auth()->user()->hasPermissionTo('Consultar retiro de cesantías') ||
                  auth()->user()->hasPermissionTo('Digitar solicitud de retiro de cesantías') ||
                  auth()->user()->hasPermissionTo('Eliminar solicitud de retiro de cesantías')
                )
                  <li class="{{ activeMenu('human_management/request_withdraw_severance*') }}"><a class="btn-send" href="{{route('request_withdraw_severance')}}"><i class="fa fa-file-invoice-dollar"></i> SOLICITUDES DE CARTA DE RETIRO DE CESANTÍAS O LABORAL</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Tomar asistencia') ||
                  auth()->user()->hasPermissionTo('Ver asistencia') ||
                  auth()->user()->hasPermissionTo('Lista de asistencias') ||
                  auth()->user()->hasPermissionTo('Eliminar asistencia') ||
                  auth()->user()->hasPermissionTo('Editar asistencia')
                )  
                  <li class="{{ activeMenu('human_management/assistance*') }}"><a class="btn-send" href="{{route('assistance')}}"><i class="fa fa-file-invoice-dollar"></i> ASISTENCIA</a></li>
                @endif
              </ul>
            </li>
        @endif
        {{-- DOCUMENTOS --}}
        @if (
          auth()->user()->hasPermissionTo('Crear documentos') ||
          auth()->user()->hasPermissionTo('Descargar documentos') ||
          auth()->user()->hasPermissionTo('Editar documentos') ||
          auth()->user()->hasPermissionTo('Eliminar documentos') ||
          auth()->user()->hasPermissionTo('Lista de documentos') ||
          auth()->user()->hasPermissionTo('Ver documentos')
        )
          <li class="treeview {{ activeMenu('document*') }}">
            <a href="#"><i class="fa fa-folder"></i> <span>DOCUMENTOS</span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if (
                auth()->user()->hasPermissionTo('Crear documentos') ||
                auth()->user()->hasPermissionTo('Descargar documentos') ||
                auth()->user()->hasPermissionTo('Editar documentos') ||
                auth()->user()->hasPermissionTo('Eliminar documentos') ||
                auth()->user()->hasPermissionTo('Lista de documentos') ||
                auth()->user()->hasPermissionTo('Ver documentos')
                )
                  <li class="{{ activeMenu('document*') }}"><a class="btn-send" href="{{ route('documents') }}"><i class="far fa-file"></i> INTERNOS</a></li>
              @endif
              <li class="hide"><a href="#"><i class="fa fa-file"></i> EXTERNOS</a></li>
            </ul>
          </li>
        @endif
        {{-- ADMINISTRACION DE USUARIOS --}}
        @if (
          auth()->user()->hasPermissionTo('Crear usuarios') ||
          auth()->user()->hasPermissionTo('Editar usuarios') ||
          auth()->user()->hasPermissionTo('Eliminar usuarios') ||
          auth()->user()->hasPermissionTo('Exportar usuarios a excel') ||
          auth()->user()->hasPermissionTo('Lista de usuarios') ||
          auth()->user()->hasPermissionTo('Ver usuarios') ||
          auth()->user()->hasPermissionTo('Restaurar usuarios eliminados') ||
          auth()->user()->hasPermissionTo('Ver usuarios eliminados') ||
          auth()->user()->hasPermissionTo('Crear roles') ||
          auth()->user()->hasPermissionTo('Editar roles') ||
          auth()->user()->hasPermissionTo('Eliminar roles') ||
          auth()->user()->hasPermissionTo('Lista de roles')
        )
            <li class="treeview {{ activeMenu('roles*') }} {{ activeMenu('retired*') }} {{ activeMenu('users*') }}">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>ADMINISTRACIÓN DE USUARIOS</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if (
                  auth()->user()->hasPermissionTo('Crear usuarios') ||
                  auth()->user()->hasPermissionTo('Editar usuarios') ||
                  auth()->user()->hasPermissionTo('Eliminar usuarios') ||
                  auth()->user()->hasPermissionTo('Exportar usuarios a excel') ||
                  auth()->user()->hasPermissionTo('Lista de usuarios') ||
                  auth()->user()->hasPermissionTo('Ver usuarios')
                  )
                    <li class="{{ activeMenu('users*') }}">
                      <a class="btn-send" href="{{ route('users') }}">
                        <i class="fa fa-user"></i> USUARIOS
                      </a>
                    </li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Restaurar usuarios eliminados') ||
                  auth()->user()->hasPermissionTo('Ver usuarios eliminados')
                )
                    <li class="{{ activeMenu('retired*') }}">
                      <a class="btn-send" href="{{ route('retired_users') }}">
                        <i class="fa fa-users-slash"></i> USUARIOS RETIRADOS
                      </a>
                    </li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Crear roles') ||
                  auth()->user()->hasPermissionTo('Editar roles') ||
                  auth()->user()->hasPermissionTo('Eliminar roles') ||
                  auth()->user()->hasPermissionTo('Lista de roles')
                )
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
        @if (
            auth()->user()->hasPermissionTo('Configurar cargos') ||
            auth()->user()->hasPermissionTo('Configurar mensajes en el sistema') ||
            auth()->user()->hasPermissionTo('Crear documentos para la cartelera') ||
            auth()->user()->hasPermissionTo('Editar documentos de la cartelera') ||
            auth()->user()->hasPermissionTo('Eliminar documentos de la cartelera')
        )
            <li class="treeview {{ activeMenu('position_settings*') }}{{activeMenu('learned_lesson*')}}{{ activeMenu('billboard*') }}{{ activeMenu('setting/messages*') }}">
              <a href="#">
                <i class="fa fa-tachometer-alt"></i> <span>ADMINISTRACIÓN DEL SISTEMA</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="hide"><a href="#"><i class="fa fa-map-marker-alt"></i> SEDES</a></li>
                <li class="hide"><a href="#"><i class="fa fa-wave-square"></i> AREAS</a></li>
                @if (auth()->user()->hasPermissionTo('Configurar cargos'))
                  <li class="{{ activeMenu('position_settings*') }}"><a class="btn-send" href="{{route('position_setting')}}"><i class="fa fa-user-plus"></i> CARGOS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('Crear documentos para la cartelera') ||
                  auth()->user()->hasPermissionTo('Editar documentos de la cartelera') ||
                  auth()->user()->hasPermissionTo('Eliminar documentos de la cartelera') ||
                  auth()->user()->hasPermissionTo('Lista de tipos de cartelera') ||
                  auth()->user()->hasPermissionTo('Crear tipos de cartelera') ||
                  auth()->user()->hasPermissionTo('Ver tipos de cartelera') ||
                  auth()->user()->hasPermissionTo('Editar tipos de cartelera') ||
                  auth()->user()->hasPermissionTo('Eliminar tipos de cartelera')
                )
                    <li class="treeview {{ activeMenu('billboard*') }}">
                      <a href="#"><i class="fa fa-wallet"></i> CARTELERA<span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        @if (
                          auth()->user()->hasPermissionTo('Crear documentos para la cartelera') ||
                          auth()->user()->hasPermissionTo('Editar documentos de la cartelera') ||
                          auth()->user()->hasPermissionTo('Eliminar documentos de la cartelera')
                        )
                            <li class="{{ activeMenu('billboards*') }}"><a class="btn-send" href="{{ route('billboard') }}"><i class="fa fa-folder-open"></i> DOCUMENTOS</a></li>
                        @endif
                        @if (
                            auth()->user()->hasPermissionTo('Lista de tipos de cartelera') ||
                            auth()->user()->hasPermissionTo('Crear tipos de cartelera') ||
                            auth()->user()->hasPermissionTo('Ver tipos de cartelera') ||
                            auth()->user()->hasPermissionTo('Editar tipos de cartelera') ||
                            auth()->user()->hasPermissionTo('Eliminar tipos de cartelera')
                          )
                            <li class="{{ activeMenu('billboard_type*') }}"><a class="btn-send" href="{{ route('billboard_type') }}"><i class="fa fa-tags"></i> TIPOS DE CARTELERAS</a></li>
                        @endif
                      </ul>
                    </li>
                @endif
                <li class="treeview {{activeMenu('learned_lesson*')}}">
                  <a href="#"><i class="fa fa-wallet"></i> LECCIONES APRENDIDAS<span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="{{ activeMenu('learned_lessons*') }}"><a class="btn-send" href="{{route('learned_lessons')}}"><i class="fa fa-comment-alt"></i> REGISTROS</a></li>
                    <li class="{{ activeMenu('learned_lesson/test*') }}"><a class="btn-send" href="{{route('learned_lessons_test')}}"><i class="fa fa-comment-alt"></i> TEST DE ENTRADA</a></li>
                  </ul>
                </li>
                @can('Configurar mensajes en el sistema')
                  <li class="{{ activeMenu('setting/messages*') }}"><a class="btn-send" href="{{route('messages')}}"><i class="fa fa-comment-alt"></i> MENSAJES DEL SISTEMA</a></li>
                @endcan
                @can('Configuraciones del sistema')
                  <li><a class="btn-send" href="{{route('system')}}"><i class="fa fa-mail-bulk"></i> CORREOS</a></li>
                @endcan
                @can('Configuraciones generales')
                  <li><a class="btn-send" href="{{route('settings')}}"><i class="fa fa-cog"></i> DATOS GENERALES</a></li>
                @endcan
              </ul>
            </li>
        @endif
        {{-- CVS --}}
        @if (
          auth()->user()->hasPermissionTo('CVS Exportar reporte de ventas') ||
          auth()->user()->hasPermissionTo('CVS Lista de ventas') ||
          auth()->user()->hasPermissionTo('CVS Crear ventas') ||
          auth()->user()->hasPermissionTo('CVS Ver ventas') ||
          auth()->user()->hasPermissionTo('CVS Finalizar ventas') ||
          auth()->user()->hasPermissionTo('CVS Cancelar ventas') ||
          auth()->user()->hasPermissionTo('CVS Pagar recibos') ||
          auth()->user()->hasPermissionTo('CVS Cancelar ventas') ||
          auth()->user()->hasPermissionTo('CVS Ver clientes') ||
          auth()->user()->hasPermissionTo('CVS Lista de móviles') ||
          auth()->user()->hasPermissionTo('CVS Crear móviles') ||
          auth()->user()->hasPermissionTo('CVS Ver móviles') ||
          auth()->user()->hasPermissionTo('CVS Editar móviles') ||
          auth()->user()->hasPermissionTo('CVS Lista de sim cards') ||
          auth()->user()->hasPermissionTo('CVS Crear sim cards') ||
          auth()->user()->hasPermissionTo('CVS Ver sim cards') ||
          auth()->user()->hasPermissionTo('CVS Editar sim cards') ||
          auth()->user()->hasPermissionTo('CVS Lista de accesorios') ||
          auth()->user()->hasPermissionTo('CVS Crear accesorios') ||
          auth()->user()->hasPermissionTo('CVS Ver accesorios') ||
          auth()->user()->hasPermissionTo('CVS Lista de recibos por pagar') ||
          auth()->user()->hasPermissionTo('CVS Editar accesorios') ||
          auth()->user()->hasPermissionTo('CVS Lista de sedes') ||
          auth()->user()->hasPermissionTo('CVS Crear sedes') ||
          auth()->user()->hasPermissionTo('CVS Ver sedes') ||
          auth()->user()->hasPermissionTo('CVS Editar sedes') ||
          auth()->user()->hasPermissionTo('CVS Lista de tipos de sim cards') ||
          auth()->user()->hasPermissionTo('CVS Crear tipos de sim cards') ||
          auth()->user()->hasPermissionTo('CVS Ver tipos de sim cards') ||
          auth()->user()->hasPermissionTo('CVS Editar tipos de sim cards') ||
          auth()->user()->hasPermissionTo('CVS Lista de activaciones') ||
          auth()->user()->hasPermissionTo('CVS Crear activaciones') ||
          auth()->user()->hasPermissionTo('CVS Ver activaciones') ||
          auth()->user()->hasPermissionTo('CVS Editar activaciones') ||
          auth()->user()->hasPermissionTo('CVS Lista de categoría de accesorios') ||
          auth()->user()->hasPermissionTo('CVS Crear categoría de accesorios') ||
          auth()->user()->hasPermissionTo('CVS Ver categoría de accesorios') ||
          auth()->user()->hasPermissionTo('CVS Editar categoría de accesorios') ||
          auth()->user()->hasPermissionTo('CVS Lista de publicidades') ||
          auth()->user()->hasPermissionTo('CVS Crear publicidades') ||
          auth()->user()->hasPermissionTo('CVS Ver publicidades') ||
          auth()->user()->hasPermissionTo('CVS Editar ventas') ||
          auth()->user()->hasPermissionTo('CVS Lista de servicios Claro') ||
          auth()->user()->hasPermissionTo('CVS Crear servicios Claro') ||
          auth()->user()->hasPermissionTo('CVS Ver servicios Claro') ||
          auth()->user()->hasPermissionTo('CVS Editar servicios Claro') ||
          auth()->user()->hasPermissionTo('CVS Editar publicidades') ||
          auth()->user()->hasPermissionTo('CVS Eliminar móviles') ||
          auth()->user()->hasPermissionTo('CVS Eliminar sim cards') ||
          auth()->user()->hasPermissionTo('CVS Eliminar servicios Claro') ||
          auth()->user()->hasPermissionTo('CVS Eliminar accesorios')
          )
          <li class="treeview {{ activeMenu('cvs*') }} {{ activeMenu('cvs*') }} {{ activeMenu('cvs*') }}">
            <a href="#">
              <i class="fa fa-store"></i> <span>CVS</span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if (
              auth()->user()->hasPermissionTo('CVS Lista de ventas') ||
              auth()->user()->hasPermissionTo('CVS Exportar reporte de ventas') ||
              auth()->user()->hasPermissionTo('CVS Crear ventas') ||
              auth()->user()->hasPermissionTo('CVS Ver ventas') ||
              auth()->user()->hasPermissionTo('CVS Editar ventas') ||
              auth()->user()->hasPermissionTo('CVS Finalizar ventas') ||
              auth()->user()->hasPermissionTo('CVS Cancelar ventas')
              )
                <li class="{{ activeMenu('cvs/sale*') }}"><a class="btn-send" href="{{ route('cvs_sales') }}"><i class="fa fa-cart-arrow-down"></i> VENTAS</a></li>
              @endif
              @if (
                auth()->user()->hasPermissionTo('CVS Lista de recibos por pagar') ||
                auth()->user()->hasPermissionTo('CVS Pagar recibos') ||
                auth()->user()->hasPermissionTo('CVS Cancelar ventas')
              )
                <li class="{{ activeMenu('cvs/invoices*') }}"><a class="btn-send" href="{{ route('cvs_invoices') }}"><i class="fa fa-file-invoice-dollar"></i> RECIBOS</a></li>
              @endif
              @if (
                auth()->user()->hasPermissionTo('CVS Lista de clientes') ||
                auth()->user()->hasPermissionTo('CVS Ver clientes')
                )
                <li class="{{ activeMenu('cvs/clients*') }}"><a class="btn-send" href="{{ route('cvs_clients') }}"><i class="fa fa-user-friends"></i> CLIENTES</a></li>
              @endif
              @if (
                auth()->user()->hasPermissionTo('CVS Lista de móviles') ||
                auth()->user()->hasPermissionTo('CVS Crear móviles') ||
                auth()->user()->hasPermissionTo('CVS Ver móviles') ||
                auth()->user()->hasPermissionTo('CVS Editar móviles') ||
                auth()->user()->hasPermissionTo('CVS Lista de sim cards') ||
                auth()->user()->hasPermissionTo('CVS Crear sim cards') ||
                auth()->user()->hasPermissionTo('CVS Ver sim cards') ||
                auth()->user()->hasPermissionTo('CVS Editar sim cards') ||
                auth()->user()->hasPermissionTo('CVS Lista de accesorios') ||
                auth()->user()->hasPermissionTo('CVS Crear accesorios') ||
                auth()->user()->hasPermissionTo('CVS Ver accesorios') ||
                auth()->user()->hasPermissionTo('CVS Lista de servicios Claro') ||
                auth()->user()->hasPermissionTo('CVS Crear servicios Claro') ||
                auth()->user()->hasPermissionTo('CVS Ver servicios Claro') ||
                auth()->user()->hasPermissionTo('CVS Editar servicios Claro') ||
                auth()->user()->hasPermissionTo('CVS Editar accesorios') ||
                auth()->user()->hasPermissionTo('CVS Eliminar móviles') ||
                auth()->user()->hasPermissionTo('CVS Eliminar sim cards') ||
                auth()->user()->hasPermissionTo('CVS Eliminar servicios Claro') ||
                auth()->user()->hasPermissionTo('CVS Eliminar accesorios')
              )
                  <li class="treeview {{ activeMenu('cvs/inventary*') }}">
                    <a href="#">
                      <i class="fa fa-border-all"></i> <span>PRODUCTOS</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de móviles') ||
                        auth()->user()->hasPermissionTo('CVS Crear móviles') ||
                        auth()->user()->hasPermissionTo('CVS Ver móviles') ||
                        auth()->user()->hasPermissionTo('CVS Editar móviles') ||
                        auth()->user()->hasPermissionTo('CVS Eliminar móviles')
                      )
                          <li class="{{ activeMenu('cvs/inventary/movile*') }}"><a class="btn-send" href="{{ route('cvs_inventary_moviles') }}"><i class="fa fa-mobile-alt"></i> MÓVILES</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Crear sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Ver sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Editar sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Eliminar sim cards')
                      )
                          <li class="{{ activeMenu('cvs/inventary/sims*') }}"><a class="btn-send" href="{{ route('cvs_inventary_sims') }}"><i class="fa fa-sim-card"></i> SIM CARDS</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Crear accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Ver accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Editar accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Eliminar servicios Claro')
                      )
                          <li class="{{ activeMenu('cvs/inventary/Accesories*') }}"><a class="btn-send" href="{{ route('cvs_inventary_Accesories') }}"><i class="fa fa-headphones-alt"></i> ACCESORIOS</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de servicios Claro') ||
                        auth()->user()->hasPermissionTo('CVS Crear servicios Claro') ||
                        auth()->user()->hasPermissionTo('CVS Ver servicios Claro') ||
                        auth()->user()->hasPermissionTo('CVS Editar servicios Claro') ||
                        auth()->user()->hasPermissionTo('CVS Eliminar accesorios')
                      )
                          <li class="{{ activeMenu('cvs/inventary/claro_services*') }}"><a class="btn-send" href="{{ route('cvs_inventary_claro_services') }}"><i class="fa fa-concierge-bell"></i> SERVICIOS CLARO</a></li>
                      @endif
                    </ul>
                  </li>
              @endif
              @if (
                auth()->user()->hasPermissionTo('CVS Lista de sedes') ||
                auth()->user()->hasPermissionTo('CVS Crear sedes') ||
                auth()->user()->hasPermissionTo('CVS Ver sedes') ||
                auth()->user()->hasPermissionTo('CVS Editar sedes') ||
                auth()->user()->hasPermissionTo('CVS Lista de tipos de sim cards') ||
                auth()->user()->hasPermissionTo('CVS Crear tipos de sim cards') ||
                auth()->user()->hasPermissionTo('CVS Ver tipos de sim cards') ||
                auth()->user()->hasPermissionTo('CVS Editar tipos de sim cards') ||
                auth()->user()->hasPermissionTo('CVS Lista de activaciones') ||
                auth()->user()->hasPermissionTo('CVS Crear activaciones') ||
                auth()->user()->hasPermissionTo('CVS Ver activaciones') ||
                auth()->user()->hasPermissionTo('CVS Editar activaciones') ||
                auth()->user()->hasPermissionTo('CVS Lista de categoría de accesorios') ||
                auth()->user()->hasPermissionTo('CVS Crear categoría de accesorios') ||
                auth()->user()->hasPermissionTo('CVS Ver categoría de accesorios') ||
                auth()->user()->hasPermissionTo('CVS Editar categoría de accesorios') ||
                auth()->user()->hasPermissionTo('CVS Lista de publicidades') ||
                auth()->user()->hasPermissionTo('CVS Crear publicidades') ||
                auth()->user()->hasPermissionTo('CVS Ver publicidades') ||
                auth()->user()->hasPermissionTo('CVS Editar publicidades')
              )
                  <li class="treeview {{ activeMenu('cvs/admin*') }}">
                    <a href="#"><i class="fa fa-wallet"></i> ADMINISTRACIÓN<span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de sedes') ||
                        auth()->user()->hasPermissionTo('CVS Crear sedes') ||
                        auth()->user()->hasPermissionTo('CVS Ver sedes') ||
                        auth()->user()->hasPermissionTo('CVS Editar sedes')
                      )
                          <li class="{{ activeMenu('cvs/admin/sedes*') }}"><a class="btn-send" href="{{ route('cvs_sedes') }}"><i class="fa fa-map-marker-alt"></i> SEDES</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de tipos de sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Crear tipos de sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Ver tipos de sim cards') ||
                        auth()->user()->hasPermissionTo('CVS Editar tipos de sim cards')
                      )
                          <li class="{{ activeMenu('cvs/admin/sims_type*') }}"><a class="btn-send" href="{{ route('cvs_admin_sims_type') }}"><i class="fa fa-file-invoice"></i> TIPOS SIM CARDS</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de activaciones') ||
                        auth()->user()->hasPermissionTo('CVS Crear activaciones') ||
                        auth()->user()->hasPermissionTo('CVS Ver activaciones') ||
                        auth()->user()->hasPermissionTo('CVS Editar activaciones')
                      )
                          <li class="{{ activeMenu('cvs/admin/activation*') }}"><a class="btn-send" href="{{ route('cvs_admin_activations') }}"><i class="fa fa-star"></i> ACTIVACIONES</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de categoría de accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Crear categoría de accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Ver categoría de accesorios') ||
                        auth()->user()->hasPermissionTo('CVS Editar categoría de accesorios')
                      )
                          <li class="{{ activeMenu('cvs/admin/accesories_category*') }}"><a class="btn-send" href="{{ route('cvs_admin_accesories_category') }}"><i class="fa fa-headphones-alt"></i> CATEGORIAS ACESORIOS</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CVS Lista de publicidades') ||
                        auth()->user()->hasPermissionTo('CVS Crear publicidades') ||
                        auth()->user()->hasPermissionTo('CVS Ver publicidades') ||
                        auth()->user()->hasPermissionTo('CVS Editar publicidades')
                      )
                          <li class="{{ activeMenu('cvs/admin/advertising*') }}"><a class="btn-send" href="{{ route('cvs_admin_advertising') }}"><i class="fa fa-ad"></i> PUBLICIDAD</a></li>
                      @endif
                    </ul>
                  </li>
              @endif
            </ul>
          </li>
        @endif
        {{-- CCJL --}}
        @if (
          auth()->user()->haspermissionTo('CCJL Crear rentas') ||
          auth()->user()->haspermissionTo('CCJL Lista de rentas') ||
          auth()->user()->haspermissionTo('CCJL Ver rentas') ||
          auth()->user()->haspermissionTo('CCJL Editar rentas') ||
          auth()->user()->haspermissionTo('CCJL Pagar rentas') ||
          auth()->user()->haspermissionTo('CCJL Recordar pago de rentas') ||
          auth()->user()->hasPermissionTo('CCJL Lista de clientes') ||
          auth()->user()->hasPermissionTo('CCJL Ver clientes') ||
          auth()->user()->hasPermissionTo('CCJL Editar clientes') ||
          auth()->user()->hasPermissionTo('CCJL Lista de canons') ||
          auth()->user()->hasPermissionTo('CCJL Ver canons') ||
          auth()->user()->hasPermissionTo('CCJL Editar canons') ||
          auth()->user()->hasPermissionTo('CCJL Crear servicios') ||
          auth()->user()->hasPermissionTo('CCJL Lista de servicios') ||
          auth()->user()->hasPermissionTo('CCJL Ver servicios') ||
          auth()->user()->hasPermissionTo('CCJL Editar servicios') ||
          auth()->user()->hasPermissionTo('CCJL Crear administraciones') ||
          auth()->user()->hasPermissionTo('CCJL Lista de administraciones') ||
          auth()->user()->hasPermissionTo('CCJL Ver administraciones') ||
          auth()->user()->hasPermissionTo('CCJL Editar Administraciones')
        )
            
            <li class="treeview {{ activeMenu('ccjl*') }}">
              <a href="#">
                <i class="fa fa-building"></i> <span>CCJL</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if (
                  auth()->user()->haspermissionTo('CCJL Lista de rentas') ||
                  auth()->user()->haspermissionTo('CCJL Crear rentas') ||
                  auth()->user()->haspermissionTo('CCJL Ver rentas') ||
                  auth()->user()->haspermissionTo('CCJL Pagar rentas') ||
                  auth()->user()->haspermissionTo('CCJL Recordar pago de rentas') ||
                  auth()->user()->haspermissionTo('CCJL Editar rentas')
                )
                    <li class="{{ activeMenu('ccjl/rent*') }}"><a class="btn-send" href="{{ route('CCJL_rents') }}"><i class="fa fa-cash-register"></i> RENTAS</a></li>
                @endif
                @if (
                  auth()->user()->hasPermissionTo('CCJL Lista de clientes') ||
                  auth()->user()->hasPermissionTo('CCJL Ver clientes') ||
                  auth()->user()->hasPermissionTo('CCJL Editar clientes')
                )
                    <li class="{{ activeMenu('ccjl/client*') }}"><a class="btn-send" href="{{ route('CCJL_clients') }}"><i class="fa fa-user-friends"></i> CLIENTES</a></li>
                @endif
                @if (
                    auth()->user()->hasPermissionTo('CCJL Lista de canons') ||
                    auth()->user()->hasPermissionTo('CCJL Ver canons') ||
                    auth()->user()->hasPermissionTo('CCJL Editar canons') ||
                    auth()->user()->hasPermissionTo('CCJL Lista de servicios') ||
                    auth()->user()->hasPermissionTo('CCJL Crear servicios') ||
                    auth()->user()->hasPermissionTo('CCJL Ver servicios') ||
                    auth()->user()->hasPermissionTo('CCJL Editar servicios') ||
                    auth()->user()->hasPermissionTo('CCJL Lista de administraciones') ||
                    auth()->user()->hasPermissionTo('CCJL Crear administraciones') ||
                    auth()->user()->hasPermissionTo('CCJL Ver administraciones') ||
                    auth()->user()->hasPermissionTo('CCJL Editar Administraciones')
                  )
                  <li class="treeview {{ activeMenu('ccjl/local*') }} {{ activeMenu('ccjl/service*') }} {{ activeMenu('ccjl/administration*') }}">
                    <a href="#">
                      <i class="fa fa-concierge-bell"></i> <span>PRODUCTOS</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      @if (
                        auth()->user()->hasPermissionTo('CCJL Lista de canons') ||
                        auth()->user()->hasPermissionTo('CCJL Ver canons') ||
                        auth()->user()->hasPermissionTo('CCJL Editar canons')
                      )
                          <li class="{{ activeMenu('ccjl/local*') }}"><a class="btn-send" href="{{ route('CCJL_locals') }}"><i class="fa fa-door-closed"></i> CANON</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CCJL Lista de servicios') ||
                        auth()->user()->hasPermissionTo('CCJL Crear servicios') ||
                        auth()->user()->hasPermissionTo('CCJL Ver servicios') ||
                        auth()->user()->hasPermissionTo('CCJL Editar servicios')
                      )
                          <li class="{{ activeMenu('ccjl/service*') }}"><a class="btn-send" href="{{ route('CCJL_services') }}"><i class="fa fa-server"></i> SERVICIOS</a></li>
                      @endif
                      @if (
                        auth()->user()->hasPermissionTo('CCJL Lista de administraciones') ||
                        auth()->user()->hasPermissionTo('CCJL Crear administraciones') ||
                        auth()->user()->hasPermissionTo('CCJL Ver administraciones') ||
                        auth()->user()->hasPermissionTo('CCJL Editar Administraciones')
                      )
                        <li class="{{ activeMenu('ccjl/administration*') }}"><a class="btn-send" href="{{ route('CCJL_administrations') }}"><i class="fa fa-hands-helping"></i> ADMINISTRACIÓN</a></li>
                      @endif
                    </ul>
                  </li>
                @endif
                {{-- REPORTE DE VENTAS --}}
              </ul>
            </li>
        @endif
        {{-- NOTIFICACIONES --}}
        <li class="{{activeMenu('notifications*')}}">
          <a  class="btn-send"href="{{route('notifications')}}">
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
            <li class="{{ activeMenu('profile*') }}"><a class="btn-send" href="{{ route('profile') }}"><i class="fa fa-user-circle"></i> PERFIL</a></li>
            <li class="{{ activeMenu('carnet*') }}"><a class="btn-send" href="{{ route('carnet') }}"><i class="fa fa-id-card"></i> CARNET</a></li>
            {{-- REPORTE DE VENTAS --}}
          </ul>
        </li>
        {{-- CONFIGURACIONES --}}
        <li class="{{activeMenu('setting*')}}">
          <a  class="btn-send"href="{{route('profile_edit')}}">
            <i class="fa fa-cogs"></i> <span>CONFIGURACIONES</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>