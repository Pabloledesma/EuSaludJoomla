@extends('eusalud2')
@section('content')
<div class="container container-fluid">
    <h1>Certificado de pagos a profesionales de la salud</h1>
    <hr/>
    <div class="row">
        <form class="form-horizontal" role="form" method="post" id="form_cert_pag" action="{{ url('info/certificado_pagos_profesionales') }}">

            @if( \Auth::user()->user_type == 'Super Admin' || \Auth::user()->user_type == 'Admin' )
            <div class="form-group">
                <label class="control-label col-sm-2" for="num_id">Número de identificación</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="num_id" id="num_id" />
                </div>
            </div>
            @endif

            <div class="form-group">
                <label class="control-label col-sm-2" for="fecha_inicio">Fecha de inicio: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ date('Y-m-d') }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="fecha_final">Fecha final: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="fecha_final" id="fecha_final" value="{{ date('Y-m-d') }}" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <input class="btn btn-default" type="submit" name="submit" id="submit" value="Descargar certificado" />
                </div>
            </div>
        </form>
        @if( count($errors) > 0 )


        @foreach($errors->all() as $e)
        <p class="bg-danger">{{ $e }}</li>
            @endforeach


            @endif


    </div>
</div>
<script>
    $().ready(function () {
        var form = $("#form_cert_pag");
        form.validate({
            rules: {
                num_id: {
                    required: true,
                    minlength: 8,
                    number: true
                }
            },
            messages: {
                num_id: {
                    required: "Por favor ingrese su número de identificación",
                    minlength: "El número de identificación debe contener minimo 8 caracteres",
                    number: "Solo se admiten números en este campo."
                }
            }
        });

        /*form.submit(function (e) {
            e.preventDefault();
                $.ajax({   
                    type: "POST",
                    url: 'certificado_pagos_profesionales',
                    data: form.serialize(),
                    success: console.log('nada'),
                   
                });           
        });*/
        
    });

</script>
@stop

