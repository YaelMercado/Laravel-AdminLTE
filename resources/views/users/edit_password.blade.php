@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Editar contraseña de usuario')

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
    					 <form action="{{ route('user.update.password',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">                            
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="nome">Contraseña</label>
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña" minlength="6" required="">
                                        @if($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('password-confirm') ? 'has-error' : '' }}">
                                        <label for="nome">Confirmar contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" minlength="6" required="">
                                        @if($errors->has('password-confirm'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password-confirm') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12"></div>
                                <div class="col-lg-6">
                                    <p class="text-muted"><b><i class="fa fa-warning"></i></b> Editando contraseña <b>{{ $user->name }}</b>.</p>
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