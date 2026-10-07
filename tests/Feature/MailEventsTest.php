<?php
namespace Tests\Feature;
use Tests\TestCase; use Illuminate\Foundation\Testing\RefreshDatabase; use Illuminate\Support\Facades\Mail; use App\Mail\WelcomeMail; use App\Mail\LoginAlertMail;
class MailEventsTest extends TestCase {use RefreshDatabase;
 public function test_welcome_and_login_mail_to_registered_address_only() {
  Mail::fake();
  $this->post('/register',['name'=>'Prueba SMTP','email'=>'correo@example.test','password'=>'Prueba-2026','password_confirmation'=>'Prueba-2026'])->assertRedirect('/dashboard');
  Mail::assertSent(WelcomeMail::class,function($mail){return $mail->hasTo('correo@example.test');});
  Mail::assertNotSent(LoginAlertMail::class);
  $this->post('/logout');
  $this->post('/login',['email'=>'correo@example.test','password'=>'wrong'])->assertSessionHasErrors('email');
  Mail::assertNotSent(LoginAlertMail::class);
  $this->post('/login',['email'=>'correo@example.test','password'=>'Prueba-2026'])->assertRedirect('/dashboard');
  Mail::assertSent(LoginAlertMail::class,function($mail){return $mail->hasTo('correo@example.test');});
  Mail::assertSent(WelcomeMail::class,1);Mail::assertSent(LoginAlertMail::class,1);
 }
}
