@extends('layouts.app')

@section('content')
<a href="categorias/novo" class="btn btn-primary">Novo</a>
<br>
<br>
  <div class="container">
      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Editar</th>
              <th>Deletar</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categorias as $categoria)
              <tr>
                <td>{{ $categoria->nome }}</td>
                <td> <a href="categorias/editar/{{ $categoria->id }}" class="btn btn-primary">Alterar</a> </td>
                <td> <a href="categorias/delete/{{ $categoria->id }}" class="btn btn-danger">Excluir</a> </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <br>
      @if(session('create-success'))
        <div class="alert alert-success">
          {{ session('create-success') }}
        </div>
      @endif
      @if(session('update-success'))
        <div class="alert alert-success">
          {{ session('update-success') }}
        </div>
      @endif
      @if(session('update-failed'))
        <div class="alert alert-danger">
          {{ session('update-failed') }}
        </div>
      @endif
      @if(session('delete-success'))
        <div class="alert alert-success">
          {{ session('delete-success') }}
        </div>
      @endif
      @if(session('delete-failed'))
        <div class="alert alert-danger">
          {{ session('delete-failed') }}
        </div>
      @endif
      </div>
  </div>
@endsection
