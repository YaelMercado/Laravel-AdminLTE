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
			
            @forelse ($courses as $course)
            
            <div class="col-sm-6 col-md-3 col-12">
                <div class="thumbnail">
                    <img src="/img/img_{{$course->id}}.png" alt="...">
                    <div class="caption">
                        <h5>{{$course->nombre}} ({{$course->codigo}})</h5>
                        
                            @if ($course->empresa_id == $empresa_id and $course->universidad_id == $course->id)
                                
                                
                                <p class="text-center" style="margin-top: 15px;" data-toggle="modal" data-target="#modal-delete-{{ $course->id_view }}"><a href="/course/view-into-course-prev/{{$course->id}}" class="btn btn-success" title="Ingresar al curso ({{$course->nombre}})" type="submit" text="Entrar" value="Entrar" id="btn-entrar">Entrar</a></p>
                            @else
                               
                            
                            @endif
                    </div>
                </div>
            </div>
                
            @empty
                <p>No hay cursos registrados</p>
            @endforelse


                						
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')