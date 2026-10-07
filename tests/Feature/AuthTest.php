<?php
namespace Tests\Feature;
use Tests\TestCase; use Illuminate\Foundation\Testing\RefreshDatabase; use App\User; use Illuminate\Support\Facades\Hash;
class AuthTest extends TestCase { use RefreshDatabase;
 public function test_guests_cannot_open_dashboard() {$this->get('/dashboard')->assertRedirect('/login');$this->get('/')->assertOk()->assertSee('Registrarse')->assertDontSee('Cerrar sesión');}
 public function test_register_login_logout_and_nav() {
  $this->post('/register',['name'=>'Alumno de prueba','email'=>'demo@example.test','password'=>'Prueba-2026','password_confirmation'=>'Prueba-2026'])->assertRedirect('/dashboard');
  $user=User::firstOrFail(); $this->assertTrue(Hash::check('Prueba-2026',$user->password));
  $this->get('/dashboard')->assertOk()->assertSee('Dashboard')->assertSee('Cerrar sesión')->assertDontSee('Registrarse');
  $this->post('/logout')->assertRedirect('/');$this->assertGuest();
  $this->post('/login',['email'=>'demo@example.test','password'=>'wrong'])->assertSessionHasErrors('email');$this->assertGuest();
  $this->post('/login',['email'=>'demo@example.test','password'=>'Prueba-2026'])->assertRedirect('/dashboard');$this->assertAuthenticatedAs($user);
 }
 public function test_registration_validation() {
  $this->post('/register',['name'=>'Test','email'=>'invalid','password'=>'short','password_confirmation'=>'other'])->assertSessionHasErrors(['email','password']);
  $this->assertEquals(0,User::count());
 }
}
