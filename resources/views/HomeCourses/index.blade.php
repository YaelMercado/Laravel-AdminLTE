@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Programas')

@section('menu_pagina')	

@endsection

@section('content')    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>      
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">

            @forelse ($courses as $course)

            <div class="col-md-3">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="https://empleabilidad.redmundua.com/theme/moove/pix/3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$course->nombre}} ({{$course->codigo}})</h5>
                        <p class="card-text">Descripción......</p>
                        <a href="#" class="btn btn-primary">Iniciar</a>
                    </div>
                </div>	
            </div>
            @empty
                <p>No users</p>
            @endforelse


                						
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')