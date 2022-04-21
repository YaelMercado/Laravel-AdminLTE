@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Programas contratados')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="/course/view-into-course-prev/{{$courses->id}}" class="link_menu_page">
        <i class="fa fa-book" aria-hidden="true"></i> Programas
		</a>								
	</li>

@endsection

@section('content')    
    <div class="box box-primary">
		<div class="box-body" style="background-image: url(/img/fondo.png);background-size: cover;">
			<div class="row" style="height: calc(100vh - 220px) !important;">

                <div class="row">
                    <div class="col-md-12">
                        <img src="/img/logo_int.png" style="width: 40%; padding:5px;" alt="">
                    </div>
                </div>
            
                <div class="row" style="margin: auto; padding-top: 5%;">
                    <div class="col-md-4">
                        <div class="col-md-10 col-md-offset-1">
                            <h4 class="text-center">ESTANCIA SEMESTRAL</h4>
                        </div>

                        <div class="col-md-10 col-md-offset-1" style="">
                            <video controls src="{{ url('/img/movilidad_semestral.mp4') }}" style="width: 100%;" alt="">
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <a href="/course/view-into-course-inter/{{$courses->id}}?estancia=3" class="btn btn-success" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">CONOCE MÁS</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-10 col-md-offset-1">
                            <h4 class="text-center">ESTANCIA CORTA</h4>
                        </div>
                        
                        <div class="col-md-10 col-md-offset-1" style="">
                            <video controls src="{{ url('/img/estancia_corta.mp4') }}" style="width: 100%;" alt="">
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <a href="/course/view-into-course-inter/{{$courses->id}}?estancia=1" class="btn btn-success" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">CONOCE MÁS</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-10 col-md-offset-1">
                            <h4 class="text-center">ESTANCIA VERANO</h4>
                        </div>
                        
                        <div class="col-md-10 col-md-offset-1" style="">
                            <video controls src="{{ url('/img/estancia_verano.mp4') }}" style="width: 100%;" alt="">
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <a href="/course/view-into-course-inter/{{$courses->id}}?estancia=2" class="btn btn-success" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">CONOCE MÁS</a>
                        </div>
                    </div>
                </div>
                
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')