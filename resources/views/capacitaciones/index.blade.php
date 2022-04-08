@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Capacitaciones')

@section('menu_pagina')	
	
	@if (Auth::user()->can('create-capacitaciones', ''))	
	<li role="presentation">
		<a href="{{ route('capacitaciones.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Añadir 
		</a>								
	</li>
	@endif
	@if (Auth::user()->can('show-capacitaciones', ''))
	<li role="presentation">
		<a href="{{ route('capacitaciones') }}" class="link_menu_page">
		<i class="fa fa-calendar-check-o" aria-hidden="true"></i> Capacitaciones
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
                                    <th>Fecha Inicio</th>
									<th>Fecha Fin</th>
									<th>Instructor</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($estancias as $est)
								<tr>
									<td>{{ $est->name }}</td>
									<td>{{ $est->descripcion }}</td>
									<td>{{ Carbon\Carbon::parse($est->fecha_inicio)->format('d/m/Y H:i') }}</td>
									<td>{{ Carbon\Carbon::parse($est->fecha_fin)->format('d/m/Y H:i') }}</td>
									@php
										$nombre = App\Models\Instructores::whereId($est->id)->first();
									@endphp
									<td>{{ $nombre->name }}</td>
									<td>
										@if (Auth::user()->can('show-capacitaciones', ''))
											<a class="btn btn-default  btn-xs" href="{{ route('capacitaciones.show', $est->id) }}" title="Ver {{ $est->name }}"><i class="fa fa-eye">   </i></a>	
										@endif
										@if (Auth::user()->can('edit-capacitaciones', ''))
											<a class="btn btn-warning  btn-xs" href="{{ route('capacitaciones.edit', $est->id) }}" title="Editar {{ $est->name }}"><i class="fa fa-pencil"></i></a>
											<a class="btn btn-info  btn-xs" href="/meetings/table/1/{{$est->id}}" title="Unidades de {{ $est->name }}"><i class="fa fa-book" aria-hidden="true"></i></a>
										@endif
										@if (Auth::user()->can('destroy-capacitaciones', ''))
											<a class="btn btn-danger  btn-xs" href="#" title="Eliminar {{ $est->name}}" data-toggle="modal" data-target="#modal-delete-{{ $est->id }}"><i class="fa fa-trash"></i></a>
										@endif
									</td>
								</tr>

										<div class="modal fade" id="modal-delete-{{ $est->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Alerta!!</h4>
													</div>
													<div class="modal-body">
														<p>¿Desea eliminar la capacitación ({{ $est->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('capacitaciones.destroy', $est->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
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
                                    <th>Fecha Inicio</th>
									<th>Fecha Fin</th>
									<th>Instructor</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</tfoot>
						</table>
					</div>
				</div>								
				<div class="col-md-12 text-center">
					{{ $estancias->links() }}
				</div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')