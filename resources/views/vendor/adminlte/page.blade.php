@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
                    <!-- Logo -->
                    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
                    </a>

                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                        </a>
            @endif
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">

                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="{{asset('images/profile/viar78.jpg')}}" class="user-image" alt="User Image">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs">{{Auth::user()->username}}</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="{{asset('images/profile/viar78.jpg')}}" class="img-circle" alt="User Image">

                                            <p>


                                                @if(Auth::user()->docente!=null)
                                                    {{ucwords(Auth::user()->docente->nombre_completo)}}
                                                @elseif(Auth::user()->alumno!=null)
                                                    {{ucwords(Auth::user()->alumno->nombre_completo)}}
                                                @else
                                                    {{ucwords('usuario no registrado')}}
                                                @endif
                                                <small><strong>{{strtoupper(Auth::user()->type)}}</strong></small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <!--li class="user-body">
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
                                            <!-- /.row -->
                                        <!--/li-->
                                        <!-- Menu Footer-->
                                        <!-- Botones Perfil y Cerrar -->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="{{url('/escuela/personal/perfil')}}" class="btn btn-default btn-flat">{{trans('adminlte::adminlte.profile')}}</a>
                                            </div>
                                            <div class="pull-right">

                                                @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" class="btn btn-default btn-flat">
                                                        <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                                    </a>
                                                @else
                                                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }} " class="btn btn-default btn-flat"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out')}}

                                                    </a>

                                                    <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                                        @if(config('adminlte.logout_method'))
                                                            {{ method_field(config('adminlte.logout_method')) }}
                                                        @endif
                                                        {{ csrf_field() }}
                                                    </form>
                                                @endif
                                            </div>
                                        </li><!-- botones Perfil y Cerrar Sesion-->
                                    </ul>
                                </li>
                            </ul><!-->
                        </div>

                    </nav>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>

        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            @if(Auth::user()->docente!=null)
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            @else
                @include('flash::message')
            @endif
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" ></script>
    @stack('js')
    @yield('js')
@stop
