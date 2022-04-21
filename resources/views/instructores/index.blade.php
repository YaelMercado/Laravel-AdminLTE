@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Instructores')

@section('menu_pagina')	
	
	@if (Auth::user()->can('create-instructores', ''))	
	<li role="presentation">
		<a href="{{ route('instructores.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Añadir 
		</a>								
	</li>
	@endif
	@if (Auth::user()->can('show-instructores', ''))
	<li role="presentation">
		<a href="{{ route('instructores') }}" class="link_menu_page">
		<i class="fa fa-user-circle"></i> Instructores
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
									<th>Semblanza</th>	 
									<th>Imagen</th>
                                    <th>Fecha</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($instructores as $ins)
								<tr>
									<td>{{ $ins->name }}</td>
									<td>{{ $ins->semblaza }}</td>
									<td><img style="width: 60px;" src="{{ str_replace('public', 'storage', $ins->imagen) }}" alt=""></td>
									<td>{{ $ins->created_at->format('d/m/Y H:i') }}</td>
									<td>
										@if (Auth::user()->can('show-instructores', ''))
											<a class="btn btn-default  btn-xs" href="{{ route('instructores.show', $ins->id) }}" title="Ver {{ $ins->name }}"><i class="fa fa-eye">   </i></a>	
										@endif
										@if (Auth::user()->can('edit-instructores', ''))
											<a class="btn btn-warning  btn-xs" href="{{ route('instructores.edit', $ins->id) }}" title="Editar {{ $ins->name }}"><i class="fa fa-pencil"></i></a>
										@endif
										@if (Auth::user()->can('destroy-instructores', ''))
											<a class="btn btn-danger  btn-xs" href="#" title="Eliminar {{ $ins->name}}" data-toggle="modal" data-target="#modal-delete-{{ $ins->id }}"><i class="fa fa-trash"></i></a>
										@endif
									</td>
								</tr>

										<div class="modal fade" id="modal-delete-{{ $ins->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Alerta!!</h4>
													</div>
													<div class="modal-body">
														<p>¿Desea eliminar la empresa ({{ $ins->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('instructores.destroy', $ins->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
													</div>
												</div>
											</div>
										</div>
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
									<th>Nombre</th>
									<th>Semblanza</th>	 
									<th>Imagen</th>
                                    <th>Fecha</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</tfoot>
						</table>
					</div>
				</div>								
				<div class="col-md-12 text-center">
					{{ $instructores->links() }}
				</div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')