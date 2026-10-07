<?php
namespace App\Http\Controllers;
use App\User; use Illuminate\Http\Request; use Illuminate\Support\Facades\Auth; use Illuminate\Support\Facades\Hash; use Illuminate\Auth\Events\Registered;
class AuthController extends Controller {
 public function loginForm() {return view('auth.login');}
 public function registerForm() {return view('auth.register');}
 public function register(Request $request) {
  $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|max:255|unique:users','password'=>'required|string|min:8|confirmed']);
  $user=User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password'])]);
  event(new Registered($user)); Auth::login($user); $request->session()->regenerate();
  return redirect()->route('dashboard')->with('status','Cuenta creada. Bienvenido.');
 }
 public function login(Request $request) {
  $data=$request->validate(['email'=>'required|email','password'=>'required|string']);
  if(!Auth::attempt($data)) return back()->withErrors(['email'=>'El correo o la contraseña no son correctos.'])->withInput($request->only('email'));
  $request->session()->regenerate(); return redirect()->intended(route('dashboard'));
 }
 public function logout(Request $request) {Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('landingpage');}
}
