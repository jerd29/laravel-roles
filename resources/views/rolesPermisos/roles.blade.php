@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <button class="btn-primary mb-2" id="createbtn-rol">Crear nuevo Rol</button>
        </div>
    <div class="row justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Permisos</th>
                <th scope="col">Fecha de Creacion</th>
                <th scope="col">Fecha de Modificacion</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        <td>{{ $rol->getAllPermissions()->pluck('name')->join(' ,') }}</td>
                        <td>{{ $rol->created_at }}</td>
                        <td>{{ $rol->updated_at }}</td>


                        <td>
                            <button class="btn-warning" id="editbtn-rol">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                            </button>

                            <button class="btn-danger" id="deletebtn-rol">
                                <i class="fa fa-trash" aria-hidden="true"> Eliminar</i>
                            </button>
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
          </table>
    </div>
</div>

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
                <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre del rol:</label>
                      <input type="text" class="form-control" id="rol-name">

                    <label for="recipient-name" class="col-form-label">Permisos:</label>
                      <br>
                      @foreach ($permisos as $permiso)

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $permiso->name }}" id="{{ $permiso->name }}" value="{{ $permiso->id }}">
                        <label class="form-check-label" for="{{ $permiso->name }}">
                            {{ $permiso->name }}
                        </label>
                      </div>
                          
                      @endforeach


                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar">
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
                <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre del rol:</label>
                      <input type="text" class="form-control" id="Erol-name">

                    <label for="recipient-name" class="col-form-label">Permisos:</label>
                      <br>
                      @foreach ($permisos as $permiso)

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $permiso->name }}" id="{{ str_replace(' ', '', $permiso->name) }}" value="{{ $permiso->id }}">
                        <label class="form-check-label" for="{{ $permiso->name }}">
                            {{ $permiso->name }}
                        </label>
                      </div>
                          
                      @endforeach


                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>
@endsection

