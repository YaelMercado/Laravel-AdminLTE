@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Añadir Roles')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('role') }}" class="link_menu_page">
			<i class="fa fa-unlock-alt"></i> Permisos
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					 <form action="{{ route('role.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Nombre</label>
                                    <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Nombre" required="" value="{{ old('name') }}" autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
                                    <label for="nome">Descripción</label>
                                    <input type="text" name="label" class="form-control" placeholder="Descripción" required="" value="{{ old('label') }}">
                                    @if($errors->has('label'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('label') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                            
                            <div class="col-lg-12">
                                <label for="nome">Permisos</label>
                                @foreach($permission_groups as $permission_group)
                                    @if($permission_group->id > 1)               
                                        <div class="panel box box-default">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#{{ $permission_group->id }}" aria-expanded="false" class="collapsed">
                                                    {{ $permission_group->name }}
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="{{ $permission_group->id }}" class="panel-collapse collapse">
                                                <div class="box-body">                               
                                                    @foreach($permission_group->permissions as $permission)
                                                        <div class="col-lg-3">
                                                            <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="icheck minimal"> {{ $permission->label }}</label>
                                                        </div>
                                                    @endforeach                                     
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach                
                            </div>
                            <div class="col-lg-6"></div> 
                            <div class="col-lg-6">
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
            $('.icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
            });
        }); 

    </script>

@endsection