<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo btn-send">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ asset('img/logo_sm.png') }}" alt="" style="height: 40px;"></span>
        <!-- logo for regular state and mobile devices -->
        {{-- <span class="logo-lg"><b>Energitelco</b></span> --}}
        <span class="logo-lg"><img src="{{ asset('img/logo.png') }}" alt="" style="height: 40px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fa fa-bars"></i>
            {{-- <span class="sr-only">Toggle navigation</span> --}}
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!--<li class="dropdown messages-menu">-->
                <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                <!--    <i class="fa fa-envelope-o"></i>-->
                <!--    <span class="label label-success">0</span>-->
                <!--  </a>-->
                <!--  <ul class="dropdown-menu">-->
                <!--    <li class="header">Tienes 0 mesnajes</li>-->
                <!--    <li>-->
                <!-- inner menu: contains the actual data -->
                <!--      <ul class="menu">-->
                <!--        {{-- <li><!-- start message -->-->
          <!--          <a href="#">-->
          <!--            <div class="pull-left">-->
          <!--              <img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">-->
          <!--            </div>-->
          <!--            <h4>-->
          <!--              Support Team-->
          <!--              <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
          <!--            </h4>-->
          <!--            <p>Why not buy a new awesome theme?</p>-->
          <!--          </a>-->
          <!--        </li> --}}-->
                <!-- end message -->
                <!--      </ul>-->
                <!--    </li>-->
                <!--    <li class="footer"><a href="#">Ver todos los mensajes</a></li>-->
                <!--  </ul>-->
                <!--</li>-->
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        @if (auth()->user()->unreadNotifications)
                            <span class="label label-warning">{{ count(auth()->user()->unreadNotifications) }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        @if (auth()->user()->unreadNotifications)
                            <li class="header">Tienes {{ count(auth()->user()->unreadNotifications) }} notificaciones
                            </li>
                        @endif
                        <li>
                            {{-- inner menu: contains the actual data  --}}
                            <ul class="menu">
                                @if (auth()->user()->unreadNotifications)
                                    @forelse (auth()->user()->unreadNotifications as $item)
                                        <li
                                            onclick="markerNotificationAsRead('{{ $item->id }}','{{ $item->data['link'] }}')">
                                            <a>
                                                <i class="fa fa-users text-aqua"></i> {{ $item->data['amount'] }}
                                            </a>
                                        </li>
                                    @empty
                                        <p>No tiene notificaciones</p>
                                    @endforelse
                                @else
                                    <p>No tiene notificaciones</p>
                                @endif
                            </ul>
                        </li>
                        <li class="footer"><a class="btn-send" href="{{ route('notifications') }}">Ver todas</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <!--<li class="dropdown tasks-menu">-->
                <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                <!--    <i class="fa fa-flag-o"></i>-->
                <!--    <span class="label label-danger">0</span>-->
                <!--  </a>-->
                <!--  <ul class="dropdown-menu">-->
                <!--    <li class="header">Tienes 0 tareas</li>-->
                <!--    <li>-->
                <!-- inner menu: contains the actual data -->
                <!--      <ul class="menu">-->
                <!--        {{-- <li><!-- Task item -->-->
          <!--          <a href="#">-->
          <!--            <h3>-->
          <!--              Design some buttons-->
          <!--              <small class="pull-right">20%</small>-->
          <!--            </h3>-->
          <!--            <div class="progress xs">-->
          <!--              <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
          <!--                <span class="sr-only">20% Complete</span>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </a>-->
          <!--        </li> --}}-->
                <!-- end task item -->
                <!--      </ul>-->
                <!--    </li>-->
                <!--    <li class="footer">-->
                <!--      <a href="#">Ver todas las tareas</a>-->
                <!--    </li>-->
                <!--  </ul>-->
                <!--</li>-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img') }}/{{ Auth::user()->foto }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('img') }}/{{ Auth::user()->foto }}" class="img-circle"
                                alt="User Image">

                            <p>
                                {{ Auth::user()->name }} - {{ ucwords(strtolower(Auth::user()->position->name)) }}
                                <small>Miembro desde el {{ Auth::user()->created_at }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        {{-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> --}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('profile') }}" class="btn btn-default btn-flat btn-send">Mi
                                    cuenta</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat btn-send" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a class="btn-send" href="{{ route('settings') }}"><i class="fa fa-cogs"></i></a>
                    {{-- data-toggle="control-sidebar" --}}
                </li>
            </ul>
        </div>
    </nav>
</header>
