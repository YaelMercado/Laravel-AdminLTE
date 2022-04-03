@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Editar Universidad')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('company') }}" class="link_menu_page">
        <i class="fa fa-building"></i> Universidades
		</a>								
	</li>

@endsection

@section('content')    
       
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
    					 <form action="{{ route('company.update',$company->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Nombre de la institución</label>
                                        <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" autofocus value="{{$company->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">Dirección</label>
                                    <input type="text" name="address" class="form-control" placeholder="Dirección" required="" value="{{$company->address}}" >
                                    @if($errors->has('direccion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">Teléfono</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Teléfono" required="" value="{{$company->phone}}">
                                    @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">Sitio web</label>
                                    <input type="text" name="url_site" class="form-control" placeholder="Sitio web" required="" value="{{$company->url_site}}">
                                    @if($errors->has('url_site'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('url_site') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">Número de identificación fiscal</label>
                                    <input type="text" name="fiscal" class="form-control" placeholder="Número de identificación fiscal" required="" value="{{$company->id_fiscal}}">
                                    @if($errors->has('fiscal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fiscal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">País</label>
                                    <select name="pais" id="pais" class="form-control select2">
                                    @forelse ($paises as $pais)
                                        <option value="{{$pais->id}}" {{($company->pais == $pais->id ? 'selected': '')}}>{{$pais->NOMBRE}}</option>
                                    @empty
                                        <option value="0">Sin paises</option>
                                    @endforelse
                                    </select>
                                    @if($errors->has('pais'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pais') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 text_id_div">
                                <div class="form-group {{ $errors->has('text_id') ? 'has-error' : '' }}">
                                    <label for="nome" class="text_id">text_id</label>
                                    <input type="text" name="text_id" id="text_id" class="form-control" placeholder="text_id" required="" value="{{$company->text_id}}">
                                    @if($errors->has('text_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name_contac') ? 'has-error' : '' }}">
                                    <label for="nome" >Nombre de contacto</label>
                                    <input type="text" name="name_contac" class="form-control" placeholder="Nombre de contacto" required="" value="{{$company->name_contact}}">
                                    @if($errors->has('name_contac'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name_contac') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name_contac') ? 'has-error' : '' }}" >
                                    <label for="nome" >Puesto</label>
                                    <input type="text" name="puesto" class="form-control" placeholder="Puesto" required="" value="{{$company->puesto}}">
                                    @if($errors->has('puesto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('puesto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name_contac') ? 'has-error' : '' }}">
                                    <label for="nome" >Correo electrónico</label>
                                    <input type="text" name="email_admin" class="form-control" placeholder="Correo electrónico" required="" value="{{$company->email}}">
                                    @if($errors->has('email_admin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email_admin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name_contac') ? 'has-error' : '' }}">
                                    <label for="nome" >Teléfono de contacto</label>
                                    <input type="text" name="phone_contact" class="form-control" placeholder="Teléfono de contacto" required="" value="{{$company->phone_contact}}">
                                    @if($errors->has('phone_contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="nome">No. Alumnos</label>
                                    <input type="number" name="alumnos" class="form-control n_alumnos" placeholder="No. Alumnos" minlength="0" required="" value="{{$company->no_alumnos}}">
                                    @if($errors->has('alumnos'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('alumnos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password-confirm') ? 'has-error' : '' }}">
                                    <label for="nome">No. Profesores</label>
                                    <input readonly type="number" name="profesores" class="form-control n_profesores" placeholder="No. Profesores" minlength="0" required="" value="{{$company->no_profesores}}">
                                    @if($errors->has('profesores'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profesores') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('zona') ? 'has-error' : '' }}">
                                    <label for="nome">Zona Horaria</label>
                                    <input type="text" name="zona" class="form-control" placeholder="Zona Horaria" required="" value="{{$company->zona_horaria}}">
                                    @if($errors->has('zona'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zona') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                                <div class="col-lg-6">
                                   <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </form>
    				</div>
    			</div>
    		</div>
    	</div>    

@endsection

@section('layout_js')    

    <script> 
        $(function(){             
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "No records found.";
                    }
                }
            });
            
            $('#icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
            });

            $('.n_alumnos').change(function (){
               var alumnos = $(this).val();

               if (alumnos > 0){
                var profesores = parseInt(alumnos) / 10;
                profesores = Math.floor(profesores)

                $('.n_profesores').val(profesores);
               }
            });


            setTimeout(function(){
                $('document').ready(function (){
                $('.text_id_div').css('display', 'block');
                var pais = $("select").val();
                var text = "ID";

                switch (pais){
                    case "29":
                        text = "NIT";
                    break;

                    case "42":
                        text = "BUSINESS NUMBER";
                    break;

                    case "52":
                        text = "NIT";
                    break;

                    case "170":
                        text = "NIT";
                    break;

                    case "68":
                        text = "NIT";
                    break;

                    case "94":
                        text = "NIT";
                    break;

                    case "13":
                        text = "CUIT";
                    break;

                    case "33":
                        text = "CPF";
                    break;

                    case "232":
                        text = "RIF";
                    break;

                    case "46":
                        text = "RUT";
                    break;

                    case "60":
                        text = "NITE";
                    break;

                    case "65":
                        text = "RNC";
                    break;

                    case "229":
                        text = "RUT";
                    break;

                    case "75":
                        text = "TIN";
                    break;

                    case "172":
                        text = "RUC";
                    break;

                    case "173":
                        text = "RUC";
                    break;

                    case "157":
                        text = "RUC";
                    break;

                    case "66":
                        text = "RUC";
                    break;

                    case "94":
                        text = "RTU";
                    break;

                    case "68":
                        text = "NIT";
                    break;

                    case "102":
                        text = "RTN";
                    break;

                    case "4":
                        text = "NIF";
                    break;

                    case "17":
                        text = "NIF";
                    break;

                    case "24":
                        text = "NIF";
                    break;

                    case "35":
                        text = "NIF";
                    break;

                    case "48":
                        text = "NIF";
                    break;

                    case "61":
                        text = "NIF";
                    break;

                    case "63":
                        text = "NIF";
                    break;

                    case "71":
                        text = "NIF";
                    break;

                    case "73":
                        text = "NIF";
                    break;

                    case "76":
                        text = "NIF";
                    break;

                    case "80":
                        text = "NIF";
                    break;

                    case "82":
                        text = "NIF";
                    break;

                    case "90":
                        text = "NIF";
                    break;

                    case "104":
                        text = "NIF";
                    break;

                    case "109":
                        text = "NIF";
                    break;

                    case "112":
                        text = "NIF";
                    break;

                    case "123":
                        text = "NIF";
                    break;

                    case "128":
                        text = "NIF";
                    break;

                    case "129":
                        text = "NIF";
                    break;

                    case "137":
                        text = "NIF";
                    break;

                    case "166":
                        text = "NIF";
                    break;

                    case "176":
                        text = "NIF";
                    break;

                    case "177":
                        text = "NIF";
                    break;

                    case "45":
                        text = "NIF";
                    break;

                    case "71":
                        text = "NIF";
                    break;

                    case "183":
                        text = "NIF";
                    break;

                    case "207":
                        text = "NIF";
                    break;

                    case "73":
                        text = "CIF";
                    break;
                }

                $('.text_id').text(text);
                $('#text_id').attr("placeholder", text);
                });
            }, 0);

            $('select').change(function (){
                $('.text_id_div').css('display', 'block');
                var pais = $(this).val();
                var text = "ID";

                switch (pais){
                    case "29":
                        text = "NIT";
                    break;

                    case "42":
                        text = "BUSINESS NUMBER";
                    break;

                    case "52":
                        text = "NIT";
                    break;

                    case "170":
                        text = "NIT";
                    break;

                    case "68":
                        text = "NIT";
                    break;

                    case "94":
                        text = "NIT";
                    break;

                    case "13":
                        text = "CUIT";
                    break;

                    case "33":
                        text = "CPF";
                    break;

                    case "232":
                        text = "RIF";
                    break;

                    case "46":
                        text = "RUT";
                    break;

                    case "60":
                        text = "NITE";
                    break;

                    case "65":
                        text = "RNC";
                    break;

                    case "229":
                        text = "RUT";
                    break;

                    case "75":
                        text = "TIN";
                    break;

                    case "172":
                        text = "RUC";
                    break;

                    case "173":
                        text = "RUC";
                    break;

                    case "157":
                        text = "RUC";
                    break;

                    case "66":
                        text = "RUC";
                    break;

                    case "94":
                        text = "RTU";
                    break;

                    case "68":
                        text = "NIT";
                    break;

                    case "102":
                        text = "RTN";
                    break;

                    case "4":
                        text = "NIF";
                    break;

                    case "17":
                        text = "NIF";
                    break;

                    case "24":
                        text = "NIF";
                    break;

                    case "35":
                        text = "NIF";
                    break;

                    case "48":
                        text = "NIF";
                    break;

                    case "61":
                        text = "NIF";
                    break;

                    case "63":
                        text = "NIF";
                    break;

                    case "71":
                        text = "NIF";
                    break;

                    case "73":
                        text = "NIF";
                    break;

                    case "76":
                        text = "NIF";
                    break;

                    case "80":
                        text = "NIF";
                    break;

                    case "82":
                        text = "NIF";
                    break;

                    case "90":
                        text = "NIF";
                    break;

                    case "104":
                        text = "NIF";
                    break;

                    case "109":
                        text = "NIF";
                    break;

                    case "112":
                        text = "NIF";
                    break;

                    case "123":
                        text = "NIF";
                    break;

                    case "128":
                        text = "NIF";
                    break;

                    case "129":
                        text = "NIF";
                    break;

                    case "137":
                        text = "NIF";
                    break;

                    case "166":
                        text = "NIF";
                    break;

                    case "176":
                        text = "NIF";
                    break;

                    case "177":
                        text = "NIF";
                    break;

                    case "45":
                        text = "NIF";
                    break;

                    case "71":
                        text = "NIF";
                    break;

                    case "183":
                        text = "NIF";
                    break;

                    case "207":
                        text = "NIF";
                    break;

                    case "73":
                        text = "CIF";
                    break;
                }

                $('.text_id').text(text);
                $('#text_id').attr("placeholder", text);
            });
            
        }); 

    </script>

@endsection