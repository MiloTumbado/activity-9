@extends('layouts.app')
@section('title', 'Registrarse')
@section('nav')@auth<a href="{{ route('dashboard') }}">Dashboard</a><form method="post" action="{{ route('logout') }}" style="display:inline">@csrf<button class="secondary">Cerrar sesión</button></form>@else<a href="{{ route('login') }}">Iniciar sesión</a><a href="{{ route('register') }}">Registrarse</a>@endauth
@endsection
@section('content')
<h1>Registrarse</h1><form method="post" action="{{ route('register.store') }}">@csrf<div class="form"><label for="name">Nombre</label><input id="name" name="name" required value="{{ old('name') }}" autocomplete="name"><label for="email">Correo electrónico</label><input id="email" name="email" type="email" required value="{{ old('email') }}" autocomplete="email"><label for="password">Contraseña</label><input id="password" name="password" type="password" required minlength="8" autocomplete="new-password"><label for="password_confirmation">Confirmar contraseña</label><input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password"><div class="actions"><button>Crear cuenta</button><a href="{{ route('login') }}">Ya tengo cuenta</a></div></div></form>
@endsection

