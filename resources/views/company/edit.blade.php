@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Editar Empresa')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('company') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Empresa
		</a>								
	</li>

@endsection

@section('content')    
       
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
    					 <form action="{{ route('company.update',$company->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Nombre</label>
                                        <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" autofocus value="{{$company->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="nome">País</label>
                                        <input type="text" name="pais" class="form-control" placeholder="País" required="" value="{{$company->pais}}">
                                        @if($errors->has('desc'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('desc') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="nome">No. Alumnos</label>
                                    <input type="number" name="alumnos" class="form-control n_alumnos" placeholder="No. Alumnos" minlength="0" required="" value="{{$company->no_alumnos}}">
                                    @if($errors->has('alumnos'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('alumnos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password-confirm') ? 'has-error' : '' }}">
                                    <label for="nome">No. Profesores</label>
                                    <input readonly type="number" name="profesores" class="form-control n_profesores" placeholder="No. Profesores" minlength="0" required="" value="{{$company->no_profesores}}">
                                    @if($errors->has('profesores'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profesores') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('zona') ? 'has-error' : '' }}">
                                    <label for="nome">Zona Horaria</label>
                                    <input type="text" name="zona" class="form-control" placeholder="Zona Horaria" required="" value="{{$company->zona_horaria}}">
                                    @if($errors->has('zona'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zona') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                                <div class="col-lg-6">
                                   <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i> Guardar</button>
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
                        return "No records found.";
                    }
                }
            });
            
            $('#icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
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