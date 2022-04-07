@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Agregar Usuarios')

@section('menu_pagina')	
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Usuarios
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					 <form action="/meetings" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">topic</label>
                                    <input type="text" name="topic" class="form-control" maxlength="30" minlength="4" placeholder="topic" required="" value="{{ old('topic') }}" autofocus>
                                    @if($errors->has('topic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('topic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">agenda</label>
                                    <input type="text" name="agenda" class="form-control" maxlength="30" minlength="4" placeholder="agenda" required="" value="{{ old('agenda') }}" autofocus>
                                    @if($errors->has('agenda'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agenda') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6"> 
                                <label for="nome">Incio de la reunión</label>
                                <div class='input-group date' id='start_time'>
                                    <input type='datetime-local' id='start_time' name='start_time' class="form-control" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <br>
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

      <script type="text/javascript">
         $(function () {
             $('#start_time').datetimepicker();
         });
      </script>
@endsection