@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <button class="btn-primary mb-2" id="createbtn-permisos">Crear nuevo Permisos</button>
    </div>
    <div class="row justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Creacion</th>
                <th scope="col">Fecha de Modificacion</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>
                        <td>{{ $permiso->created_at }}</td>
                        <td>{{ $permiso->updated_at }}</td>

                        <td>
                            <button class="btn-warning" id="editbtn-permisos">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                            </button>

                            <button class="btn-danger" id="deletebtn-permisos">
                                <i class="fa fa-trash" aria-hidden="true"> Eliminar</i>
                            </button>
                        </td>
                    </tr>
                
                @endforeach

                
            </tbody>
          </table>
          {{ $permisos->onEachSide(5)->links() }}


    </div>
</div>

    <div class="modal fade" id="createmodal-permisos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Crear permiso</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nombre del permiso:</label>
                          <input type="text" class="form-control" id="permiso-name">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editmodal-permisos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar permiso</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editform-permisos" class="form-horizontal" method="POST" action="">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nombre del permiso:</label>
                          <input type="text" class="form-control" id="Epermiso-name">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-warning" value="Editar">
                </div>
            </div>
        </div>
    </div>
@endsection
