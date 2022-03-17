@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Cursos contratados')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="/course/view-into-course/{{$courses->id}}" class="link_menu_page">
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
                            <img src="/img/logo_int.png" style="width: 25%; padding:5px;" alt="">
                        </div>
                    </div>
                
                    <div class="col-md-12" style="margin: auto; padding-top: 2%; padding-bottom: 2%;">
                        <h3>Estancia Semestral 2022</h3>
                        
                        <ul>
                            <li>Modalidad a México, Queretaro</li>
                        </ul>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="col-md-12" style="border-top: solid black 1px; border-bottom: solid black 1px;">
                            <h3>Información:</h3>

                            <div class="col-md-12">
                                <div class="col-m-8 col-offset-2">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-12">
                                                <img src="/img/mexico.png" style="width: 100%; padding:5px;" alt="">
                                            </div>
                                            <h4>País Destino</h4>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-12">
                                                <img src="/img/uni.png" style="width: 100%%; padding:5px;" alt="">
                                            </div>
                                            <h4>Universidad Destino</h4>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-12">
                                                <img src="/img/portafolio.png" style="width: 100%; padding:5px;" alt="">
                                            </div>
                                            <h4>Politicas y Reglamento</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 col-md-offset-4">
                                <a href="/course/view-into-course-inter/{{$courses->id}}?estancia=3" class="btn btn-success" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">SOLICITAR</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <img src="/img/semestral.png" style="width: 100%; padding:5px;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')