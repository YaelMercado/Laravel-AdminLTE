@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Editar Carreras')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('carrers') }}" class="link_menu_page">
        <i class="fa fa-graduation-cap"></i> Carreras
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
                                    <input type="text" disabled name="name" class="form-control" placeholder="Nombre" required="" value="{{ $estancias->name }}" autofocus>
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
                                    <textarea class="form-control" disabled id="summary_ckeditor" name="summary_ckeditor" value="{{ $estancias->descripcion }}">{{ $estancias->descripcion }}</textarea>
                                    @if($errors->has('summary_ckeditor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('summary_ckeditor') }}</strong>
                                        </span>
                                    @endif
                                </div>
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