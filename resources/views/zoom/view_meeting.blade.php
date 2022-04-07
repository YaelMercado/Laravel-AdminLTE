@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Reunión Zoom')

@section('menu_pagina')	
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

	<li role="presentation">
		<a href="#" class="link_menu_page">
			<i class="fa fa-user"></i> Reuniones de Zoom
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
                    <div class="iframe-container" style="overflow: hidden; padding-top: 56.25%; position: relative;">
                            <iframe allow="microphone; camera" style="border: 0; height: 100%; left: 0; position: absolute; top: 0; width: 100%;" src="https://success.zoom.us/wc/join/{{$meeting_id}}" frameborder="0"></iframe>
                    </div>
				</div>
			</div>
		</div>
	</div>    

@endsection

@section('layout_js')

@endsection