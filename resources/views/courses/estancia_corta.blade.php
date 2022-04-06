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
                        <h3>ESTANCIA CORTA 2022-2023</h3>
                        
                        <p><strong>México Industrial</strong> - Octubre 2022
                        7 días – Cuidad de México/Querétaro</p>
                        <p><strong>Ecuador Cooperativo</strong> – Febrero 2023
                        7 días – Quito/ Cuidad Mitad del Mundo</p>
                        <p><strong>Colombia Comercial</strong> - Abril 2023
                        7 días – Bogotá/ Chía/ Zipaquir </p>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="col-md-12" style="border-top: solid black 1px; border-bottom: solid black 1px;">
                            <h3>Información:</h3>

                            <div class="col-md-12">
                                <div class="col-m-8 col-offset-2">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-12">
                                                <img src="/img/3pais.png" style="width: 100%; padding:5px;" alt="">
                                            </div>
                                            <h4>País Destino</h4>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-12">
                                                <img src="/img/portafolio.png" style="width: 100%%; padding:5px;" alt="">
                                            </div>
                                            <h4>Politicas y Reglamento</h4>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-12">
                                                <img src="/img/agenda.png" style="width: 100%; padding:5px;" alt="">
                                            </div>
                                            <h4>Agenda</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 col-md-offset-4">
                                <a href="/course/view-into-course-inter/{{$courses->id}}?estancia=1" class="btn btn-success" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">SOLICITAR</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <img src="/img/corta.png" style="width: 100%; padding:5px;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')