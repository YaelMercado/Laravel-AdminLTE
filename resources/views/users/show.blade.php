@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View User')

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
    					<div class="col-lg-3 text-center">
                            <br>
                            @if(file_exists($user->avatar))
                              <img src="{{ asset($user->avatar) }}" class="profile-user-img img-responsive img-circle">
                            @else
                              <img src="{{ asset('public/img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
                            @endif
                            <h3 class="profile-username text-center">
                                {{ $user->name }}    
                            </h3>                        
                            @if($user->active == true)
                                <span class="label label-success">Activo</span>
                            @else
                                <span class="label label-danger">Inactivo</span>
                            @endif                        
                        </div>
                        <div class="col-lg-9">
                            <div class="attachment">
                                <h4><b>Correo: </b></h4>
                                <span>{{ $user->email }}</span>
                                <h4><b>Perfil</b></h4>
                                @foreach($roles as $role)
                                    @if(in_array($role->id, $roles_ids))
                                        <span style="font-size:12px;" class="label label-primary">{{ $role->name }}</span> 
                                    @endif                                             
                                @endforeach
                                <br><br>
                                @if ($empresas)
                                <h4><b>Universidad Inscrita</b></h4>
                                <span style="font-size:12px;" class="label label-warning">{{ $empresas->name }}</span> 
                                <br><br>
                                @endif
                                
                                <p class="help-block"><i class="fa fa-clock-o"></i> Creado: {{$user->created_at->format('d/m/Y H:i') }}</p>
                                <p class="help-block"><i class="fa fa-refresh"></i> Ultima modificación: {{$user->updated_at->format('d/m/Y H:i') }}</p>
                                <br>
                                <div class="pull-right">                            
                                    <a href="{{ route('user.edit.password', $user->id) }}" title="Change Password {{ $user->name }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-key"></i> Cambiar contraseña</button></a>
                                    <a href="{{ route('user.edit', $user->id) }}" title="Edit {{ $user->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Editar</button></a>
                                </div>
                            </div>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>    
    @endif
@endsection