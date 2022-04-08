@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Agregar Unidades')

@section('menu_pagina')	
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
            <i class="fa fa-book" aria-hidden="true"></i> Unidades
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
                                    <label for="nome">Código</label>
                                    <input type="text" name="codigo" class="form-control" maxlength="30" minlength="4" placeholder="Código" required="" value="{{ old('codigo') }}" autofocus>
                                    @if($errors->has('codigo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('codigo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Nombre</label>
                                    <input type="text" name="topic" class="form-control" maxlength="30" minlength="4" placeholder="Nombre" required="" value="{{ old('topic') }}" autofocus>
                                    @if($errors->has('topic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('topic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Descripción</label>
                                    <textarea class="form-control" required="" id="summary_ckeditor" placeholder="Descripción" name="summary_ckeditor"></textarea>
                                    @if($errors->has('summary_ckeditor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('summary_ckeditor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Agenda</label>
                                    <input type="text" name="agenda" class="form-control" maxlength="30" minlength="4" placeholder="agenda" required="" value="{{ old('agenda') }}" autofocus>
                                    @if($errors->has('agenda'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agenda') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6"> 
                                <label for="nome">Inicio de la reunión</label>
                                <div class='input-group date' id='start_time'>
                                    <input type='datetime-local' id='start_time' name='start_time' class="form-control" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="{{$type}}">
                            <input type="hidden" name="id_cerf_cap" value="{{$id}}">
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