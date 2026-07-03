@extends('Layout.app')

@section('content')
<h1>lista de profesores</h1>

{{$teachers}}

<a class="btn btn-secondary" href="/teacher/create" role="button">Ir a formulario</a>

@endsection
