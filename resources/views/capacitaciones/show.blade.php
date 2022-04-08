@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Editar Capacitaciones')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('capacitaciones') }}" class="link_menu_page">
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Capacitaciones
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            
                        <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Nombre</label>
                                    <input disabled type="text" name="name" class="form-control" placeholder="Nombre" required="" value="{{$estancias->name}}" autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Descripción</label>
                                    <textarea disabled class="form-control" required="" id="summary_ckeditor" value="{{$estancias->descripcion}}" name="summary_ckeditor">{{$estancias->descripcion}}</textarea>
                                    @if($errors->has('summary_ckeditor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('summary_ckeditor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6"> 
                                <label for="nome">Fecha Inicio</label>
                                <div class="input-group date" id="start_time">
                                    <input disabled type="datetime-local" required="" id="fecha_inicio" value="{{ Carbon\Carbon::parse($estancias->fecha_inicio)->format('Y-m-d\TH:i:s')}}" name="fecha_inicio" class="form-control">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-6"> 
                                <label for="nome">Fecha Fin</label>
                                <div class="input-group date" id="start_time">
                                    <input disabled type="datetime-local" required="" id="fecha_fin" name="fecha_fin" value="{{ Carbon\Carbon::parse($estancias->fecha_fin)->format('Y-m-d\TH:i:s')}}" class="form-control">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <label for="universidad">Instructor</label>
                                    <select disabled class="form-control select2" name="instructor_id" id="instructor_id" required="">
                                        @foreach($instructores as $instructor)
                                            <option value="{{$instructor->id}}" {{($estancias->id_instructor == $instructor->id ? "selected" : "")}} >{{$instructor->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
				</div>
			</div>
		</div>
	</div>    

@endsection

@section('layout_js')
    
    <script> 
        $(function(){             
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "Nenhum registro encontrado.";
                    }
                }
            }); 

            $('.n_alumnos').change(function (){
               var alumnos = $(this).val();

               if (alumnos > 0){
                var profesores = parseInt(alumnos) / 10;
                profesores = Math.floor(profesores)

                $('.n_profesores').val(profesores);
               }
            });
        }); 

    </script>

@endsection