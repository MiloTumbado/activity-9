@extends('layouts.app')
@section('title', 'Iniciar sesión')
@section('nav')@auth<a href="{{ route('dashboard') }}">Dashboard</a><form method="post" action="{{ route('logout') }}" style="display:inline">@csrf<button class="secondary">Cerrar sesión</button></form>@else<a href="{{ route('login') }}">Iniciar sesión</a><a href="{{ route('register') }}">Registrarse</a>@endauth@endsection
@section('content')
<h1>Iniciar sesión</h1><form method="post" action="{{ route('login.store') }}">@csrf<div class="form"><label for="email">Correo electrónico</label><input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}"><label for="password">Contraseña</label><input id="password" name="password" type="password" required autocomplete="current-password"><div class="actions"><button>Iniciar sesión</button><a href="{{ route('register') }}">Crear una cuenta</a></div></div></form>
@endsection
