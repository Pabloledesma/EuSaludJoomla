<nav class="navbar navbar-inverse navbar-static-top">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('inicio') }}">
            <img src="{{ asset('img/logo colores.png') }}" height="60" />
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="{{ url('inicio') }}">Inicio</a></li>
            @if( Auth::guest() )
            <li><a href="{{ url('/auth/login') }}">Iniciar Sesión</a></li>
                
            @else
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informes <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('info/form_certificado_pagos_profesionales') }}">Certificado de pagos a profesionales de la salud</a></li>
                    <li><a href="#">Facturación bruta</a></li>
                    <li><a href="#">Radicación</a></li>
                    <li><a href="#">Ordenes de Compra</a></li>
                    <li><a href="#">Consulta y entrega</a></li>
                    <li><a href="#">Egresos</a></li>
                    <li><a href="#">Ingresos</a></li>
                    <li><a href="#">Movimientos de bodega</a></li>
                    <li><a href="#">Procedimientos</a></li>
                    <li><a href="#">Tiempo de atención</a></li>
                    <li><a href="#">Censo</a></li>
                    <li><a href="#">Bodega inventario</a></li>
                    <li><a href="#">Cuentas 4, 5 y 6</a></li>
                    <!--                        <li class="divider"></li>-->

                </ul>
            </li>
            @if( \Auth::user()->user_type == "Super Admin" )
            <li>
                <a href="{{ url('usuarios') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios</a>
               
            </li>
            @endif
            <li class='user-menu'>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ \Auth::user()->name }}</a>
                <ul class="dropdown-menu" role="menu">
                    @if( \Auth::user()->user_type == 'Super Admin' || \Auth::user()->user_type == 'Admin' )
                        <li><a href="{{ url('/auth/register') }}">Nuevo usuario</a></li>
                    @endif
                    <li><a href="{{ url('/auth/logout') }}">Cerrar Sesión</a></li>
                </ul>
            </li>    
               
            @endif

        </ul>
    </div>

</nav>
