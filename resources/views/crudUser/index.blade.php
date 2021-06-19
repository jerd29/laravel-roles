@extends('layouts.app')

@section('css')

{{-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> --}}
{{-- <script src="https://use.fontawesome.com/e47b547a8e.js"></script> --}}
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <a href="{{ route('register') }}">
            @can('crear usuarios')
            <button class="btn-primary mb-2">Crear Usuario</button>
            @endcan
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
                @if(auth()->user()->can('editar usuarios') || auth()->user()->can('eliminar usuarios'))
                    <th scope="col">Acciones</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @role('super-admin')

                    @foreach ($usuarios_superadmin as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->created_at }}</td>
                            <td>{{ $usuario->getRoleNames()->join(',') }}</td>
                            <td>{{ $usuario->getAllPermissions()->pluck('name')->join(' ,') }}</td>

                            <td>

                                @can('editar usuarios')
                                        <button class="btn-warning" id="editbtn-rol">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                                        </button>
                                @endcan

                                @can('eliminar usuarios')
                                        <button class="btn-danger" id="deletebtn-rol">
                                            <i class="fa fa-trash" aria-hidden="true"> Eliminar</i>
                                        </button>
                                @endcan
                            </td>

                        </tr>
                    
                    @endforeach
                @endrole

                @unlessrole('super-admin')
                    @foreach ($usuarios_admin as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at }}</td>
                        <td>{{ $usuario->getRoleNames()->join(',') }}</td>
                        <td>{{ $usuario->getAllPermissions()->pluck('name')->join(' ,') }}</td>
                        <td>

                            @can('editar usuarios')
                                    <button class="btn-warning" id="editbtn-rol">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                                    </button>
                            @endcan

                            @can('eliminar usuarios')
                                    <button class="btn-danger" id="deletebtn-rol">
                                        <i class="fa fa-trash" aria-hidden="true"> Eliminar</i>
                                    </button>
                            @endcan
                        </td>
                    </tr>
                
                    @endforeach
                @endrole

            </tbody>
          </table>
    </div>
</div>
@endsection
