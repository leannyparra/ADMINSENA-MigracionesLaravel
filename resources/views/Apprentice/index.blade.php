@extends('Layout.app')

@section('content')
<h1>lista de aprendices</h1>

{{$apprentices}}

<a class="btn btn-secondary" href="/apprentice/create" role="button">Ir a formulario</a>

@endsection
