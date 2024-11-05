@extends('layouts.app')

@section('content')
<h2>Registrar Nuevo Usuario</h2>

<form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Campos de registro -->
    <!-- Similar a los campos del modal proporcionado anteriormente, pero con cada uno -->
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection
