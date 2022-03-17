@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Universidades')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('company') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Universidades
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
                    <img src="https://empleabilidad.redmundua.com/theme/moove/pix/3.jpg" alt="...">
                    <div class="caption">
                        <h5>{{$course->nombre}} ({{$course->codigo}})</h5>
                        <p>Descripción......</p>
                            @if ($course->empresa_id == $empresa_id and $course->universidad_id == $course->id)
                                <span class="label label-success">Activado</span>
                                
                                <p class="text-center" style="margin-top: 15px;" data-toggle="modal" data-target="#modal-delete-{{ $course->id_view }}"><input class="btn btn-danger" title="Se desactiva el curso del plan de esta universidad ({{$course->nombre}})" type="submit" text="Desactivar" value="Desactivar" id="btn-inscribir"/></p>
                                
                                <div class="modal fade" id="modal-delete-{{ $course->id_view }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Alerta!!</h4>
													</div>
													<div class="modal-body">
														<p>¿Desea desactivar este curso del plan de la universidad ({{ $course->nombre }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('company.view_home_course_assing_destroy', $course->id_view) }}" ><button type="button" class="btn btn-danger"> Desactivar</button></a>
													</div>
												</div>
											</div>
										</div>
                            @else
                                <span class="label label-danger">Desactivado</span>
                                <form action="/company/view_home_course_assing_store" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$course->id}}" name="id_course">
                                    <input type="hidden" value="{{$empresa_id}}" name="empresa_id">
                                    <p class="text-center" style="margin-top: 15px;"><input class="btn btn-success" type="submit" text="Inscribir" value="Inscribir" id="btn-inscribir"/></p>
                                </form>
                            
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