<?php
use Illuminate\Support\Facades\Route;
Route::view('/','landingpage')->name('landingpage');
Route::middleware('guest')->group(function(){
 Route::get('/login','AuthController@loginForm')->name('login');
 Route::post('/login','AuthController@login')->middleware('throttle:6,1')->name('login.store');
 Route::get('/register','AuthController@registerForm')->name('register');
 Route::post('/register','AuthController@register')->middleware('throttle:6,1')->name('register.store');
});
Route::middleware('auth')->group(function(){
 Route::view('/dashboard','dashboard')->name('dashboard');
 Route::post('/logout','AuthController@logout')->name('logout');
});
