@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <form class="" action="../update/{{ $categoria->id }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" class="form-control" name="nome" value="{{ $categoria->nome }}">
        </div>
        <button type="submit" name="button" class="btn btn-primary">Alterar categoria</button>
      </form>
    </div>
  </div>
@endsection
