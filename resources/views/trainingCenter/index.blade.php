@extends('Layout.app')

@section('content')
<h1>lista de Centros de Formacion</h1>

{{$trainingCenters}}

<a class="btn btn-secondary" href="/training-center/create" role="button">Ir a formulario</a>

@endsection
