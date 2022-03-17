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
                            <img src="/img/logo_cer.png" style="width: 25%; padding:5px;" alt="">
                        </div>
                    </div>
                
                    <div class="col-md-12" style="margin: auto; padding-top: 2%; padding-bottom: 2%;">
                        <h2>LIDERAZGO POSITIVO</h2>

                        <p>
                        El objetivo del Curso de Liderazgo, es que los participantes logren ser
                        conscientes que el primer liderazgo es sobre uno mismo, y que todo
                        depende del manejo de las emociones.
                        </p>

                        <p>
                        Habrán aprendido, además, las capacidades emotivas fundamentales,
                        as  como las t cnicas y herramientas para establecer objetivos e caces,
                        para motivar y obtener el máximo de ellos mismos y de cada persona a
                        cargo, reconociendo el rol adecuado de cada uno para poder crear un
                        equipo e ciente.
                        </p>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3">
                                <a href="/course/view-into-course-view/{{$courses->id}}" class="btn btn-danger" style="color:white; width:100%; border-radius: 10px; margin-top: 10px;">REGISTRAR CERTIFICACIÓN</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <img src="/img/info.png" style="width: 100%; padding:5px;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')