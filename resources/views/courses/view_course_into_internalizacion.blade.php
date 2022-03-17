@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Cursos contratados')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('course') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Cursos
		</a>								
	</li>

@endsection

@section('content')    
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
            
                <div class="col-md-4">
                    <div class="col-md-10 col-md-offset-1">
                        <h4 class="text-center">ESTANCIA SEMESTRAL</h4>
                    </div>

                    <div class="col-md-10 col-md-offset-1" style="">
                        <img src="{{ url('/img/estancia_semetral.png') }}" style="width: 100%;" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10 col-md-offset-1">
                        <h4 class="text-center">ESTANCIA CORTA</h4>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1" style="">
                        <img src="{{ url('/img/estancia_corta.png') }}" style="width: 100%;" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10 col-md-offset-1">
                        <h4 class="text-center">ESTANCIA VERANO</h4>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1" style="">
                        <img src="{{ url('/img/estancia_verano.png') }}" style="width: 100%;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')