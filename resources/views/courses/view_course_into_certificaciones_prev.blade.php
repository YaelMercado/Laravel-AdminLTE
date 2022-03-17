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
			<div class="row" style="height: calc(100vh - 220px) !important;">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="/img/logo_cer.png" style="width: 25%; padding:5px;" alt="">
                        </div>
                    </div>
                
                    <div class="col-md-12" style="margin: auto; padding-top: 2%; padding-bottom: 2%;">
                        
                        <img src="/img/teaser.png" style="width: 100%; padding:5px;" alt="">
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3">
                                <a href="/course/view-into-course/{{$courses->id}}" class="btn btn-danger" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">OFERTAS DE CURSOS</a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3">
                                <a href="#" class="btn btn-primary" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">MIS CURSOS</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <img src="/img/img_4.png" style="width: 100%; padding:5px;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')