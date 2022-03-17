@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Cursos contratados')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="/course/view-into-course-info/{{$courses->id}}" class="link_menu_page">
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
                        <h3>LIDERAZGO POSITIVO</h3>
                        <h4>Introducción</h4>
                        
                        <div class="col-md-12" style="border-top: solid black 1px;">
                            <img src="/img/teaser.png" style="width: 100%; padding: 5px;" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p>
                        Se presentar n a los participantes los elementos necesarios para el desarrollo de
                        habilidades y actitudes que les permitan desempe arse como l deres seguros,
                         exibles, anal ticos y efectivos.
                        </p>
                    </div>

                    <div class="col-md-12">
                        <h4>Qué haremos en el curso?</h4>
                    </div>

                    <div class="col-md-12" style="border-top: solid black 1px;">
                            <img src="/img/teaser.png" style="width: 100%; padding: 5px;" alt="">
                    </div>

                    <div class="col-md-12" style="border-top: solid black 1px;">
                        <h4>ENTREGABLES</h4>
                    </div>

                   
                    <div class="col-md-8 col-md-offset-2" style="border: dashed black 3px; background: #80808029; height: 150px; border-radius: 15px;" >
                        <div class="row">
                            <input type="file" text="Subir Archivo">
                        </div>
                    </div>
                    
                   
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <img src="/img/menu.png" style="width: 100%; padding:5px;" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')