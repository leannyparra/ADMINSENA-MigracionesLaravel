@extends('Layout.app')

@section('content')
<h1>lista de computadores</h1>

{{$computers}}

<a class="btn btn-secondary" href="/computer/create" role="button">Ir a formulario</a>

@endsection
