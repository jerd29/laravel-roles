@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            @can('crear roles')
            <button class="btn-primary mb-2" id="createbtn-rol">Crear nuevo Rol</button>
            @endcan
        </div>
    <div class="row justify-content-center">
        <table class="table table-bordered" id="table_rols">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Permisos</th>
                <th scope="col">Fecha de Creacion</th>
                <th scope="col">Fecha de Modificacion</th>
                @if(auth()->user()->can('editar roles') || auth()->user()->can('eliminar roles'))
                    <th scope="col">Acciones</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @role('super-admin')

                    @foreach ($roles_superadmin as $rol)
                        <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>
                            <td>{{ $rol->getAllPermissions()->pluck('name')->join(' ,') }}</td>
                            <td>{{ $rol->created_at }}</td>
                            <td>{{ $rol->updated_at }}</td>
                            <td>

                                @can('editar roles')
                                        <button class="btn-warning" id="editbtn-rol">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                                        </button>
                                @endcan

                                @can('eliminar roles')
                                        <button class="btn-danger" id="deletebtn-rol">
                                            <i class="fa fa-trash" aria-hidden="true"> Eliminar</i>
                                        </button>
                                @endcan
                            </td>

                        </tr>
                    
                    @endforeach
                @endrole

                @unlessrole('super-admin')
                    @foreach ($roles_admin as $rol)
                        <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>
                            <td>{{ $rol->getAllPermissions()->pluck('name')->join(' ,') }}</td>
                            <td>{{ $rol->created_at }}</td>
                            <td>{{ $rol->updated_at }}</td>

                            <td>

                                @can('editar roles')
                                        <button class="btn-warning" id="editbtn-rol">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                                        </button>
                                @endcan

                                @can('eliminar roles')
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

<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="modal fade" id="createmodal-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Crear Rol</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="rolform" method="POST">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre del rol:</label>
                      <input type="text" class="form-control" id="rol-name">
                      <div id="mensaje_np" class="ocultar" style="display: none; color:red;">Debe agregar el nombre del Rol</div>
                    

                    <label for="recipient-name" class="col-form-label">Permisos:</label>
                      <br>
                      @foreach ($permisos as $permiso)

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="{{ $permiso->name }}" id="{{ $permiso->name }}" value="{{ $permiso->name }}">
                        <label class="form-check-label" for="{{ $permiso->name }}">
                            {{ $permiso->name }}
                        </label>
                      </div>                         
                      @endforeach
                      <div id="mensaje_per" class="ocultar" style="display: none; color:red;">Debe otorgar algun permiso</div>



                    </div>

                    <div class="modal-footer">
                        {{-- <input type="submit" class="btn btn-primary" value="Guardar"> --}}
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editmodal-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Editar Rol</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="erolform">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre del rol:</label>
                      <input type="text" class="form-control" id="Erol-name">
                      <div id="emensaje_np" class="ocultar" style="display: none; color:red;">Debe agregar el nombre del Rol</div>


                    <label for="recipient-name" class="col-form-label">Permisos:</label>
                      <br>
                      @foreach ($permisos as $permiso)

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="{{ $permiso->name }}" id="{{ str_replace(' ', '', $permiso->name) }}" value="{{ $permiso->id }}">
                        <label class="form-check-label" for="">
                            {{ $permiso->name }}
                        </label>
                      </div>
                          
                      @endforeach
                      <div id="emensaje_per" class="ocultar" style="display: none; color:red;">Debe otorgar algun permiso</div>


                    </div>
                        <div class="modal-footer">
                            {{-- <input type="submit" class="btn btn-primary" value="Guardar"> --}}
                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                        </div>
                        </div>
                  </form>
            </div>

    </div>
</div>


@section('js')

<script src="{{ asset('js/main.js') }}"></script>        

@endsection
@endsection

