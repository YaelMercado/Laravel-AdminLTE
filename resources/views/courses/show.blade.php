@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Ver Curso')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('course') }}" class="link_menu_page">
        <i class="fa fa-book" aria-hidden="true"></i> Cursos
		</a>								
	</li>

@endsection

@section('content')    
   
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Nombre</label>
                                        <input type="text" readonly name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" autofocus value="{{$course->nombre}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="nome">Descripción</label>
                                        <input type="text" readonly name="desc" class="form-control" placeholder="Descripción" required="" value="{{$course->codigo}}">
                                        @if($errors->has('desc'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('desc') }}</strong>
                                            </span>
                                        @endif
                                    </div>
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
                        return "No records found.";
                    }
                }
            });
            
            $('#icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
            });
        }); 

    </script>

@endsection