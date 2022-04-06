@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Ver Instructor')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('instructores') }}" class="link_menu_page">
        <i class="fa fa-user-circle"></i> Instructores
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					 
                        
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Nombre</label>
                                    <input type="text" name="name" disabled class="form-control" maxlength="30" minlength="4" placeholder="Nombre" required="" value="{{ $estancias->name }}" autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Fotografia</label>
                                    <input type="file" disabled class="form-control-file" name="fondo">
                                    <br>
                                    <img style="width: 50%;" src="{{ str_replace('public', '/storage', $estancias->imagen) }}" alt="">
                                    @if($errors->has('fondo-img'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fondo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-12 col-12">
                                <div class="form-group ">
                                    <label for="universidad">Semblanza</label>
                                    <textarea disabled class="form-control" id="summary_ckeditor" value="{{ $estancias->semblaza }}" name="summary_ckeditor">{{ $estancias->semblaza }}</textarea>
                                    @if($errors->has('summary_ckeditor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('summary_ckeditor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-lg-6"></div> 
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