@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Cursos')

@section('menu_pagina')	

	@if (Auth::user()->can('create-course', ''))	
	<li role="presentation">
		<a href="{{ route('course.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Añadir 
		</a>								
	</li>
	@endif
	@if (Auth::user()->can('show-course', ''))
	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
		<i class="fa fa-book" aria-hidden="true"></i> Cursos
		</a>								
	</li>
	@endif

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>			 
									<th>Nombre</th>			 
									<th>Descripción</th>
									<th>Fecha de creación</th>			 
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($courses as $course)
									
										<tr>
											<td>{{ $course->nombre }}</td>             
											<td>{{ $course->codigo }}</td>               
											<td>{{ $course->created_at->format('d/m/Y H:i') }}</td>             
											<td class="text-center"> 
											@if (Auth::user()->can('show-course', ''))
												 <a class="btn btn-default  btn-xs" href="{{ route('course.show', $course->id) }}" title=See {{ $course->nombre }}"><i class="fa fa-eye">   </i></a>						 
											@endif
											@if (Auth::user()->can('edit-course', ''))
												 <a class="btn btn-warning  btn-xs" href="{{ route('course.edit', $course->id) }}" title="Edit {{ $course->nombre }}"><i class="fa fa-pencil"></i></a>
											@endif
											@if (Auth::user()->can('destroy-course', ''))	 
												 <a class="btn btn-danger  btn-xs" href="#" title="Eliminar {{ $course->name}}" data-toggle="modal" data-target="#modal-delete-{{ $course->id }}"><i class="fa fa-trash"></i></a>
											@endif
											</td> 
										</tr>
										<div class="modal fade" id="modal-delete-{{ $course->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>¿Desea eliminar el curso ({{ $course->nombre }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('course.destroy', $course->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
													</div>
												</div>
											</div>
										</div>
									
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
									<th>Nombre</th>			 
									<th>Descripción</th>
									<th>Fecha de creación</th>			 
									<th class="text-center">Acciones</th>			 
								</tr>
							</tfoot>
						</table>
					</div>
				</div>								
				<div class="col-md-12 text-center">
					{{ $courses->links() }}
				</div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')