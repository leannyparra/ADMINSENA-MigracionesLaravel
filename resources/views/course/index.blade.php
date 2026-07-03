@extends('Layout.app')

@section('content')
<h1>lista de cursos</h1>

{{$courses}}

<a class="btn btn-secondary" href="/course/create" role="button">Ir a formulario</a>

@endsection
