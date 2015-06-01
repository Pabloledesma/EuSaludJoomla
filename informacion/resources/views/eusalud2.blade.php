<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

        <title>Clínica EuSalud</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- JqueryUi Style Smooth -->
        <link href="{{ asset('/css/jquery-ui-1.9.2.custom.css') }}" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/carousel.css') }}" rel="stylesheet">
          <script language="JavaScript" type="text/javascript" src="{{ asset('/js/jquery-1.8.3.js') }}"></script>
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script language="JavaScript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/holder.js') }}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
        
        <!-- JqueryUI Core Javascript -->
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
        
        <!-- Custom Scripts -->
        <scrpit language="Javascript" type="text/javascript" src="{{ asset('/js/calendarios.js') }}"></scrpit>
    </head>
    <!-- NAVBAR
    ================================================== -->
    <body>

        <div class="navbar-wrapper">
            @include('welcome.nav')     
        </div>

        @if( Session::has('flash_message') )
        <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if(Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss='alert' aria-hidden='true'>&times;</button>
            @endif
            {{ Session::get('flash_message') }}
        </div>
        @endif

        @yield('content')




        <!-- FOOTER -->
        <div class="container footer">
            <footer>
                <p class="pull-right"><a href="#">Volver arriba</a></p>
                <p>&copy; {{ date('Y') }} Clínica EuSalud, &middot; <a href="#">Políticas de privacidad</a> &middot; <a href="#">Terminos y condiciones</a></p>
            </footer>   
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
      
        <script>
            //Mensajes 
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
            
            //Calendarios
            $(function( factory ){
                $("#fecha_inicio").datepicker();
                $("#fecha_final").datepicker();
                if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
        }(function( datepicker ) {

            datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: '&#x3C;Ant',
                    nextText: 'Sig&#x3E;',
                    currentText: 'Hoy',
                    monthNames: ['enero','febrero','marzo','abril','mayo','junio',
                    'julio','agosto','septiembre','octubre','noviembre','diciembre'],
                    monthNamesShort: ['ene','feb','mar','abr','may','jun',
                    'jul','ago','sep','oct','nov','dic'],
                    dayNames: ['domingo','lunes','martes','miércoles','jueves','viernes','sábado'],
                    dayNamesShort: ['dom','lun','mar','mié','jue','vie','sáb'],
                    dayNamesMin: ['D','L','M','X','J','V','S'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''};
                 datepicker.setDefaults({
                               showAnim: "show",
                               dateFormat: "yy-mm-dd"
                           });
                datepicker.setDefaults(datepicker.regional['es']);

            return datepicker.regional['es'];
            
         }));
        </script>
    </body>
</html>