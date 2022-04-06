@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Cursos contratados')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="/course/view-into-course-prev/{{$courses->id}}" class="link_menu_page">
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
                        <h2>AGOSTO – DICIEMBRE 2022</h2>

                        <ul style="list-decoration: none;">
                        <li><a href="/course/view-into-course-info/{{$courses->id}}">LIDERAZGO POSITIVO</a></li>
                        <li>MARKETING DIGITAL</li>
                        <li>GESTION ÓPTIMA DE PROYECTOS</li>
                        <li>TRABAJO COLABORATIVO Y EQUIPOS DE ALTO DESEMPE O</li>
                        <li>COOPERATIVISMO Y ECONOMÍA SOCIAL</li>
                        <li>PRODUCTIVIDAD Y GESTI N DEL TIEMPO</li>
                        </ul>
                    </div>

                    <div class="col-md-12" style="margin: auto; padding-top: 2%; padding-bottom: 2%;">
                        <h2>ENERO – MAYO 2023</h2>

                        <ul style="list-decoration: none;">
                        <li>CREATIVIDAD Y RESOLUCIÓN DE CONFLICTOS</li>
                        <li>INDUSTRIA 4.0</li>
                        <li>NEGOCIOS DIGITALES Y TRANSCULTURALES</li>
                        <li>COMUNICACIÓN EFECTIVA</li>
                        <li>REINGENIERIA ACTITUDINAL</li>
                        <li>COMPROMISO SOCIAL PARA EMPRENDEDORES</li>
                        </ul>
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