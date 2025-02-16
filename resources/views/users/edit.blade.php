@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Editar Usuario')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Usuarios
		</a>								
	</li>

@endsection

@section('content')    
    @if ($user->id != 1)     
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
    					 <form action="{{ route('user.update',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Nombre</label>
                                        <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Nombre" required="" autofocus value="{{$user->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="nome">Correo</label>
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{$user->email}}">
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                        <label for="nome">Perfil</label>
                                        <select name="roles[]" class="form-control select2" multiple="multiple" data-placeholder="Roles">
                                            @foreach($roles as $role)
                                                @if($role->id != 1)
                                                    @if(in_array($role->id, $roles_ids))
                                                        <option value="{{ $role->id}}" selected="true"> {{ $role->name}} </option>
                                                    @else
                                                        <option value="{{ $role->id}}"> {{ $role->name}} </option>
                                                    @endif                                             
                                                @endif                                             
                                            @endforeach
                                        </select>
                                        @if($errors->has('roles'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('roles') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-6">
                                <label for="universidad">Universidad</label>
                                    <select class="form-control select2" name="company_id" id="company_id" required="">
                                        @foreach($empresas as $company)
                                            <option value="{{$company->id}}" {{($company->id == $user->company_id ? 'selected' : '')}} >{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-6 text-center">
                                    <div class="form-group" style="margin:auto;">                                    
                                        <label>
                                            <input type="hidden" name="active" value="0">
                                            <input type="checkbox" name="active" value="1" class="minimal" id="icheck" 
                                            @if($user->active == true)
                                                checked
                                            @endif
                                            >
                                            Activo
                                        </label>
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
    @endif

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