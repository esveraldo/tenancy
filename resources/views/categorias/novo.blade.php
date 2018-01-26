@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <form class="" action="store" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" class="form-control" name="nome" value="">
        </div>
        <button type="submit" name="button" class="btn btn-primary">Criar nova categoria</button>
      </form>
    </div>
  </div>
@endsection
