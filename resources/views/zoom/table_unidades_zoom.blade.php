@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', '')

@section('menu_pagina')	
	
	@if (Auth::user()->can('create-'.$var_cap, ''))	
	<li role="presentation">
		<a href="/meetings/create/{{$type}}/{{$id}}" class="link_menu_page">
			<i class="fa fa-plus"></i> Añadir 
		</a>								
	</li>
	@endif
	@if (Auth::user()->can('show-'.$var_cap, ''))
	<li role="presentation">
		<a href="/{{ $var_cap }}" class="link_menu_page">
		<i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$var_cap}}
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
                                    <th>Código</th>		 	 
									<th>Nombre</th>
									<th>Descripción</th>
                                    <th>Agenda</th>
                                    <th>Url Zoom</th>
									<th>Inicio de la reunión</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($estancias as $est)
								<tr>
									<td>{{ $est->codigo }}</td>
									<td>{{ $est->name }}</td>
                                    <td>{{ $est->descripcion }}</td>
                                    <td>{{ $est->agenda }}</td>
                                    <td><a href="{{ $est->url_zoom }}" target="_blank">{{ $est->url_zoom }}</a></td>
									<td>{{ Carbon\Carbon::parse($est->fecha_zoom)->format('d/m/Y H:i') }}</td>
									<td>
										@if (Auth::user()->can('show-'.$var_cap, ''))
											<a class="btn btn-default  btn-xs" href="{{ route('unidades.show', $est->id) }}" title="Ver {{ $est->name }}"><i class="fa fa-eye">   </i></a>	
										@endif
										@if (Auth::user()->can('edit-'.$var_cap, ''))
											<a class="btn btn-warning  btn-xs" href="{{ route('unidades.edit', $est->id ) }}" title="Editar {{ $est->name }}"><i class="fa fa-pencil"></i></a>
										@endif
										@if (Auth::user()->can('destroy-'.$var_cap, ''))
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
														<p>¿Desea eliminar la unidad ({{ $est->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('unidades.destroy', $est->id_zoom) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
													</div>
												</div>
											</div>
										</div>
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
                                    <th>Código</th>		 	 
									<th>Nombre</th>
									<th>Descripción</th>
                                    <th>Agenda</th>
                                    <th>Url Zoom</th>
									<th>Inicio de la reunión</th>
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