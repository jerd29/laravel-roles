@extends('layouts.app')

@section('css')

{{-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> --}}
{{-- <script src="https://use.fontawesome.com/e47b547a8e.js"></script> --}}
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <a href="{{ route('register') }}">
            <button class="btn-primary mb-2">Crear Usuario</button>
        </a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de Creacion</th>
                <th scope="col">Roles</th>
                <th scope="col">Permisos</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at }}</td>
                        <td>{{ $usuario->getRoleNames()->join(',') }}</td>
                        <td>{{ $usuario->getAllPermissions()->pluck('name')->join(' ,') }}</td>
                        <td>
                        <a href="{{}}">
                            <button class="btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                            </button>
                        </a>
                            <button class="btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"> Eliminar</i>
                            </button>
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
