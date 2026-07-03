@extends('Layout.app')

@section('content')
<h1>lista de Areas</h1>

{{$areas}}

<a class="btn btn-secondary" href="/area/create" role="button">Ir a formulario</a>

@endsection
