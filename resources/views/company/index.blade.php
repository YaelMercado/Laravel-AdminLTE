@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Universidades')

@section('menu_pagina')	
	
	@if (Auth::user()->can('create-company', ''))	
	<li role="presentation">
		<a href="{{ route('company.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Añadir 
		</a>								
	</li>
	@endif
	@if (Auth::user()->can('show-company', ''))
	<li role="presentation">
		<a href="{{ route('company') }}" class="link_menu_page">
		<i class="fa fa-building"></i> Empresas
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
									<th>Alumnos Contratados</th>
									<th>Alumnos Registrados</th>
									<th>Profesores Contratados</th>
									<th>Profesores Registrados</th>
									<th>País</th>	
									<th>Zona Horaria</th>	
									<th>Fecha de creación</th>	 
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($company as $comp)
									
										<tr>
											<td>{{ $comp->name }}</td>             
											<td>{{ $comp->no_alumnos }}</td>
											<td>{{ App\Models\User::user_registrados($comp->id, 4)}}</td>               
											<td>{{ $comp->no_profesores }}</td> 
											<td>{{ App\Models\User::user_registrados($comp->id, 5)}}</td>
											@php
												$pa = App\Models\Pais::where('id', $comp->pais)->get();
											@endphp
											@foreach($pa as $p)
												<td>{{ $p->NOMBRE }}</td>
											@endforeach
											@if (empty($pa))
												<td>Sin país</td>
											@endif
											<td>{{ $comp->zona_horaria }}</td>  
											<td>{{ $comp->created_at->format('d/m/Y H:i') }}</td>             
											<td class="text-center"> 
												@if (Auth::user()->can('show-company', ''))
												 <a class="btn btn-default  btn-xs" href="{{ route('company.show', $comp->id) }}" title="Ver {{ $comp->name }}"><i class="fa fa-eye">   </i></a>	
												 @endif
												 @if (Auth::user()->can('create-company', ''))
												 <a class="btn btn-primary  btn-xs" href="{{ route('company.assign_course', $comp->id) }}" title="Asignar Programas a {{ $comp->name }}"><i class="fa fa-users"></i></a>					 
												 @endif
												 @if (Auth::user()->can('edit-company', ''))
												 <a class="btn btn-warning  btn-xs" href="{{ route('company.edit', $comp->id) }}" title="Editar {{ $comp->nombre }}"><i class="fa fa-pencil"></i></a>
												 @endif
												 @if (Auth::user()->can('destroy-company', ''))
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
														<a href="{{ route('company.destroy', $comp->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
													</div>
												</div>
											</div>
										</div>
									
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
									<th>Nombre</th>			 
									<th>Número de Alumnos</th>
									<th>Número de Profesores</th>
									<th>País</th>	
									<th>Zona Horaria</th>	
									<th>Fecha de creación</th>	 
									<th class="text-center">Acciones</th>			 
								</tr>
							</tfoot>
						</table>
					</div>
				</div>								
				<div class="col-md-12 text-center">
					{{ $company->links() }}
				</div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')