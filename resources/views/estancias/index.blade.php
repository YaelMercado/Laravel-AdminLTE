@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Estancias')

@section('menu_pagina')	
	
	@if (Auth::user()->can('create-estancia', ''))	
	<li role="presentation">
		<a href="{{ route('estancias.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Añadir 
		</a>								
	</li>
	@endif
	@if (Auth::user()->can('show-estancia', ''))
	<li role="presentation">
		<a href="{{ route('estancias') }}" class="link_menu_page">
		<i class="fa fa-globe"></i> Estancias
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
									<th>Estancia</th>			 
									<th>Nombre</th>
									<th>Imagen</th>
									<th>Fecha Inicio</th>	
									<th>Fecha Fin</th>	
									<th>País Destino</th>	 
                                    <th>Fecha</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($estancias as $comp)
									
										<tr>
											<td>{{ $comp->type_estancia }}</td>             
											<td>{{ $comp->name }}</td>               
											<td ><img style="width: 60px;" src="{{ str_replace('public', 'storage', $comp->imagen_portada) }}" alt=""></td> 
											<td>{{ $comp->fecha_inicio }}</td>
											<td>{{ $comp->fecha_fin }}</td>  
                                            <td>{{ $comp->pais_destino }}</td>
											<td>{{ $comp->created_at->format('d/m/Y H:i') }}</td>             
											<td class="text-center"> 
												@if (Auth::user()->can('show-estancia', ''))
												 <a class="btn btn-default  btn-xs" href="{{ route('estancias.show', $comp->id) }}" title="Ver {{ $comp->name }}"><i class="fa fa-eye">   </i></a>	
												 @endif
												 @if (Auth::user()->can('edit-estancia', ''))
												 <a class="btn btn-warning  btn-xs" href="{{ route('estancias.edit', $comp->id) }}" title="Editar {{ $comp->nombre }}"><i class="fa fa-pencil"></i></a>
												 @endif
												 @if (Auth::user()->can('destroy-estancia', ''))
												 <a class="btn btn-danger  btn-xs" href="#" title="Eliminar {{ $comp->name}}" data-toggle="modal" data-target="#modal-delete-{{ $comp->id }}"><i class="fa fa-trash"></i></a>
												 @endif
											</td> 
										</tr>
										<div class="modal fade" id="modal-delete-{{ $comp->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Alerta!!</h4>
													</div>
													<div class="modal-body">
														<p>¿Desea eliminar la empresa ({{ $comp->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('estancias.destroy', $comp->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
													</div>
												</div>
											</div>
										</div>
									
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
                                    <th>Estancia</th>			 
									<th>Nombre</th>
									<th>Imagen</th>
									<th>Fecha Inicio</th>	
									<th>Fecha Fin</th>	
									<th>País Destino</th>	 
                                    <th>Fecha</th>
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