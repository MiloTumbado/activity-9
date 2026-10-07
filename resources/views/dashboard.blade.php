@extends('layouts.app')
@section('title', 'Dashboard')
@section('nav')@auth<a href="{{ route('dashboard') }}">Dashboard</a><form method="post" action="{{ route('logout') }}" style="display:inline">@csrf<button class="secondary">Cerrar sesión</button></form>@else<a href="{{ route('login') }}">Iniciar sesión</a><a href="{{ route('register') }}">Registrarse</a>@endauth
@endsection
@section('content')
<h1>Dashboard</h1><h2>Hola, {{ auth()->user()->name }}</h2><p>Has iniciado sesión. Este panel es tu espacio privado para organizar tu aprendizaje.</p><div class="actions"><a href="{{ route('landingpage') }}">Volver al inicio</a></div>
@endsection

