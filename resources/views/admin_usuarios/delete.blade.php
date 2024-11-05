@extends('layouts.app')

@section('content')
<h2>¿Estás seguro de que deseas eliminar a este usuario?</h2>
<form method="POST" action="{{ route('usuarios.destroy', $usuario->idusuario) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
