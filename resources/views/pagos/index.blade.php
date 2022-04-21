@extends('layouts.AdminLTE.index')

@section('icon_page', 'fa fa-money')

@section('title', 'Pagos')

@section('menu_pagina')	
	
	@if (Auth::user()->can('create-carrers', ''))	
	
	@endif
	@if (Auth::user()->can('show-carrers', ''))
	
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
									<th>Pago ID</th>
									<th>Descripción</th>
									<th>Monto</th>
									<th>Concepto</th>
                                    <th>Fecha</th>
									<th class="text-center">Acciones</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($estancias as $est)
								<tr>
									<td>{{ $est->user_id }}</td>
									<td>{{ $est->pay_id }}</td>
									<td>{{ $est->descripcion }}</td>
									<td>{{ $est->mount }}</td>
									<td>{{ $est->concept }}</td>
									<td>{{ $est->created_at->format('d/m/Y H:i') }}</td>
									<td>
										@if (Auth::user()->can('show-carrers', ''))
											<a class="btn btn-default  btn-xs" href="{{ route('pagos.show', $est->id) }}" title="Ver {{ $est->name }}"><i class="fa fa-eye">   </i></a>	
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
														<p>¿Desea eliminar la empresa ({{ $est->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('carrers.destroy', $est->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
													</div>
												</div>
											</div>
										</div>
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
									<th>Nombre</th>
									<th>Pago ID</th>
									<th>Descripción</th>
									<th>Monto</th>
									<th>Concepto</th>
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