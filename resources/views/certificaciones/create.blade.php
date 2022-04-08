@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Agregar Certificaciones')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('certificaciones') }}" class="link_menu_page">
            <i class="fa fa-certificate"></i> Certificaciones
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					 <form action="{{ route('certificaciones.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" required="" value="{{ old('name') }}" autofocus>
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
                                    <textarea class="form-control" required="" id="summary_ckeditor" name="summary_ckeditor"></textarea>
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
                                    <input type="datetime-local" required="" id="fecha_inicio" name="fecha_inicio" class="form-control">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-6"> 
                                <label for="nome">Fecha Fin</label>
                                <div class="input-group date" id="start_time">
                                    <input type="datetime-local" required="" id="fecha_fin" name="fecha_fin" class="form-control">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <label for="universidad">Instructor</label>
                                    <select class="form-control select2" name="instructor_id" id="instructor_id" required="">
                                        @foreach($instructores as $instructor)
                                            <option value="{{$instructor->id}}" >{{$instructor->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            
                            <div class="col-lg-6"></div> 
                            <div class="col-lg-6">
                                <br>
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Añadir</button>
                            </div>
                        </div>
                    </form>
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