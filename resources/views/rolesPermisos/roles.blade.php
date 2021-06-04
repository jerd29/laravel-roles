@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="">
            <button class="btn-primary mb-2">Crear nuevo Rol</button>
        </a>
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
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        <td>{{ $rol->created_at }}</td>
                        <td>{{ $rol->updated_at }}</td>
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
