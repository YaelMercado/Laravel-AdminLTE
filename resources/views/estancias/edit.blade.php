@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Agregar Estancias')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('estancias') }}" class="link_menu_page">
        <i class="fa fa-globe"></i> Estancias
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					 <form action="{{ route('estancias.update',$estancias->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-6">
                                <label for="universidad">Tipo de Estancia</label>
                                <select class="form-control select2" name="type_estancia" id="type_estancia" required="required">
                                   <option value="1" {{($estancias->type_estancia == 1 ? "selected": "")}} >Estancia Corta</option>
                                   <option value="2" {{($estancias->type_estancia == 2 ? "selected": "")}} >Estancia de Verano</option>
                                   <option value="3" {{($estancias->type_estancia == 3 ? "selected": "")}} >Estancia Semestral</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Nombre</label>
                                    <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Nombre" required="" value="{{ $estancias->name }}" autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-12">
                                <div class="form-group ">
                                    <label for="universidad">Descripción</label>
                                    <textarea class="form-control" id="summary_ckeditor" name="summary_ckeditor" value="{{ $estancias->descripcion }}">{{ $estancias->descripcion }}</textarea>
                                    @if($errors->has('summary_ckeditor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('summary_ckeditor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Fecha Inicio</label>
                                    <input type="date" class="form-control" required="required" id="inicio" name="inicio" value="{{ $estancias->fecha_inicio }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Fecha Fin</label>
                                    <input type="date" class="form-control" required="required" id="fin" name="fin" value="{{ $estancias->fecha_fin }}">
                            
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">País Destino</label>
                                    <input type="text" name="pais" class="form-control" placeholder="País" value="{{ $estancias->pais_destino }}">
                                    @if($errors->has('pais'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pais') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">Universidad Destino</label>
                                    <input type="text" name="universidad" class="form-control" placeholder="Universidad" value="{{ $estancias->universidad_destino }}" >
                                    @if($errors->has('universidad'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('universidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Imagen País Destino</label>
                                    <input type="file" class="form-control-file" name="destino">
                                    <br>
                                    <img style="width: 20%;" src="{{ str_replace('public', '/storage', $estancias->imagen_pais_destino) }}" alt="">
                                    @if($errors->has('destino'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('destino') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Imagen Universidad Destino</label>
                                    <input type="file" class="form-control-file" name="unidestino">
                                    <br>
                                    <img style="width: 20%;" src="{{ str_replace('public', '/storage', $estancias->imagen_universidad_destino) }}" alt="">
                                    @if($errors->has('unidestino'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('unidestino') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Archivo de reglamento y politicas</label>
                                    <input type="file" class="form-control-file" name="file-politicas-reglamento">
                                    @if($errors->has('file-politicas-reglamento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('politicas') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-6">
                                <div class="form-group ">
                                    <label for="universidad">Archivo de Agenda</label>
                                    <input type="file" class="form-control-file" name="file-agenda">
                                    @if($errors->has('file-agenda'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agenda') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-12">
                                <div class="form-group ">
                                    <label for="universidad">Imagen de fondo</label>
                                    <input type="file" class="form-control-file" name="fondo">
                                    <br>
                                    <img style="width: 10%;" src="{{ str_replace('public', '/storage', $estancias->imagen_fondo) }}" alt="">
                                    @if($errors->has('fondo-img'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fondo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-lg-6"></div> 
                            <div class="col-lg-6">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Editar</button>
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