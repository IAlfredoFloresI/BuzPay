@extends('layouts.app')

@section('content')
<h2>Detalles del Usuario</h2>
<p>Nombre: {{ $usuario->nombre }} {{ $usuario->apellidop }} {{ $usuario->apellidom }}</p>
<p>Correo: {{ $usuario->correo_electronico }}</p>
<p>Fecha de Nacimiento: {{ $usuario->nacimiento }}</p>
<img src="{{ asset('storage/' . $usuario->img) }}" alt="Imagen de Perfil">
@endsection
