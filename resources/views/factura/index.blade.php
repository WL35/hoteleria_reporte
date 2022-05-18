@extends('layouts.app')

@section('content')
<?php
      $cli_id="";
      $cli_nombre="";
$cli_apellido="";
$cli_cedula="";

$email="";
$cli_telefono="";
$cli_direccion="";

if(isset($cliente)){
$cli_id=$cliente->cli_id;
$cli_nombre=$cliente->cli_nombre;
$cli_apellido=$cliente->cli_apellido;
$cli_cedula=$cliente->cli_cedula;
$email=$cliente->email;
$cli_telefono=$cliente->cli_telefono;
$cli_direccion=$cliente->cli_direccion;
}




?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    Factura
                </div>
                <div class="card-body">

                 <!-- <div class="row">
                     <div class="col-md-6">
                     <div class="form-group row">
                                                            <label for="fac_numero" class="col-md-4 col-form-label text-md-right">{{ __('NRO de Factura') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="fac_numero" type="number" class="form-control @error('fac_numero') is-invalid @enderror" name="fac_numero" value="{{ old('fac_numero') }}" required autocomplete="fac_numero" autofocus>

                                                                @error('fac_numero')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                     </div>
                 </div> -->
                  
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="cli_id" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                                <div class="col-md-6">
<form action="{{route('factura.create')}}" method="POST">
@csrf
    <select class="form-control " id="buscador_clientes" name="cli_id" id="validationCustom04" required>
        <option disabled selected value="">Seleccione un Cliente</option>
        
                                        @foreach($clientes as $cli)
                                      @if($cli->cli_id==$cli_id)
                                        <option selected value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>
                                      @else
                                        <option  value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>

                                      @endif
                                       
                                       
                                        @endforeach
                                    </select>
                                    
                                    
                                    <button style="border:none;position: absolute; right: -8%;top: 3%;">
                                        
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" style="position: absolute; right: -8%;top: 3%;" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                        </svg>
                                    </button>
                                    
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                    <script>
                                        $("#buscador_clientes").select2({
                                            
                                            tags: true
                                        });
                                        </script>
                                        <!-- <button>cargar</button> -->

</form>

                                </div>
                            </div>

                            
                            <div class="form-group row">
                                                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_nombre" type="text" class="form-control @error('cli_nombre') is-invalid @enderror" name="cli_nombre" value="{{$cli_nombre}}" value="{{ old('cli_nombre') }}" required autocomplete="cli_nombre" autofocus>

                                                                @error('cli_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="cli_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_apellido" type="text" value="{{$cli_apellido}}" class="form-control @error('cli_apellido') is-invalid @enderror" name="cli_apellido" value="{{ old('cli_apellido') }}" required autocomplete="cli_apellido" autofocus>

                                                                @error('cli_apellido')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                     

                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" value="{{$email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="cli_telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_telefono" value="{{$cli_telefono}}" type="number" class="form-control @error('cli_telefono') is-invalid @enderror" name="cli_telefono" value="{{ old('cli_telefono') }}" required autocomplete="cli_telefono" autofocus>

                                                                @error('cli_telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_direccion" value="{{$cli_direccion}}" type="text" class="form-control @error('cli_direccion') is-invalid @enderror" name="cli_direccion" value="{{ old('cli_direccion') }}" required autocomplete="cli_direccion" autofocus>

                                                                @error('cli_direccion')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- 
            <div class="card">
                <div class="card-header bg-dark text-center" style="background: #4873C1;color:white">
                    Detalle De La Factura
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <th>NRO de Habitacion</th>
                        <th>Nombre</th>
                        <th>Detalle</th>
                        <th>Nro De Camas</th>
                        <th>Valor Total</th>
                        <th></th>
                        <tr>
                            <td>
                                <form action="{{route('fac_detalle.create')}}" method="post">

                                    <select class="form-control " id="buscador_habitaciones" name="hab_id" id="validationCustom04" required>
                                        <option disabled selected value="">Seleccione una Habitacion</option>

                                        @foreach($habitaciones as $hab)
                                        <option value="{{$hab->hab_id}}">Habitacion NRO: {{$hab->hab_id}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                    <script>
                                        $("#buscador_habitaciones").select2({
                                            
                                            tags: true
                                        });
                                        </script> 
                            </td>
                            <td>
                                <input type="text" disabled class="form-control">
                            </td>
                            <td>
                                <input type="text" disabled class="form-control">
                            </td>
                             <td>
                                <input type="text" disabled class="form-control">
                            </td>
                            <td>
                                <input type="text" disabled class="form-control">
                            </td>
                            <td>
                                <button class="btn btn-success" name="btn_detalle" value="btn_detalle" >+</button>
                                
                            </td>
                        </form>
                            
                        </tr>
                    </table>
                </div>
            </div> -->
        </div>
    </div>
    @endsection