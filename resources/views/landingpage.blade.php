@extends('layouts.app')
@section('title', 'Landingpage')
@section('nav')@auth<a href="{{ route('dashboard') }}">Dashboard</a><form method="post" action="{{ route('logout') }}" style="display:inline">@csrf<button class="secondary">Cerrar sesión</button></form>@else<a href="{{ route('login') }}">Iniciar sesión</a><a href="{{ route('register') }}">Registrarse</a>@endauth
@endsection
@section('content')
<h1>Landingpage</h1><p>Bienvenido a tu espacio de aprendizaje. Registra una cuenta para entrar a tu panel personal.</p><div class="actions">@guest<a class="button" href="{{ route('register') }}">Crear mi cuenta</a><a href="{{ route('login') }}">Ya tengo una cuenta</a>@else<a class="button" href="{{ route('dashboard') }}">Ir al dashboard</a>@endguest</div>
@endsection

