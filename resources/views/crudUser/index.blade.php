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
                                @if (auth()->user()->can('editar usuarios') ||
                                    auth()->user()->can('eliminar usuarios'))
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
                                            <button class="btn-warning" id="editbtn-user">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                                            </button>
                                        @endcan

                                        @can('eliminar usuarios')
                                            <button class="btn-danger" id="deletebtn-user">
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

    <div class="modal fade" id="editmodal-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="euserform">
                        <div class="form-group">
                            <label for="Euser-name" class="col-form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="Euser-name">
                            <div id="emensaje_nameuser" class="ocultar" style="display: none; color:red;">Debe colocar un nombre de usuario</div>

                            <label for="Euser-email" class="col-form-label">Correo:</label>
                            <input type="text" class="form-control" id="Euser-email">
                            <div id="emensaje_emailuser" class="ocultar" style="display: none; color:red;">Debe agregar un Correo Electronico</div>

                            <label for="roles" class="col-form-label">{{ __('Rol') }}</label>

                            <div class="col-md-4">

                                <select name="roles" id="roles" class="form-control">
                                    @role('super-admin')

                                    @foreach ($roles_superadmin as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                    @endrole

                                    @unlessrole('super-admin')

                                    @foreach ($roles_admin as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                    @endrole

                                </select>
                            </div>

                        </div>

                        <div id="emensaje_per" class="ocultar" style="display: none; color:red;">Debe otorgar algun permiso
                        </div>


                <div class="modal-footer">
                    {{-- <input type="submit" class="btn btn-primary" value="Guardar"> --}}
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </div>

            </div>
            </form>
        </div>

    </div>

</div>

@section('js')

    <script src="{{ asset('js/usuarios.js') }}"></script>

@endsection

@endsection
