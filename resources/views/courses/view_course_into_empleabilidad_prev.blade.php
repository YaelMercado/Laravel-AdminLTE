@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Programas contratados')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('course') }}" class="link_menu_page">
        <i class="fa fa-book" aria-hidden="true"></i> Programas
		</a>								
	</li>

@endsection

@section('content')    
    <div class="box box-primary">
		<div class="box-body" style="background-image: url(/img/fondo.png);background-size: cover;">
			<div class="row" style="height: calc(100vh - 220px) !important;">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="/img/logo_emp.png" style="width: 40%; padding:5px;" alt="">
                        </div>
                    </div>
                
                    <div class="col-md-12" style="margin: auto; padding-top: 2%; padding-bottom: 2%;">
                        
                        <video controls src="/img/empleabilidad.mp4" style="width: 100%; padding:5px;" alt="">
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3">
                                <a href="https://empleabilidad.redmundua.com/" class="btn btn-danger" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">INGRESAR</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <img src="/img/img_3.png" style="width: 100%; padding:5px;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')