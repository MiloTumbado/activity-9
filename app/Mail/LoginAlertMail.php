<?php
namespace App\Mail;
use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Queue\SerializesModels;
class LoginAlertMail extends Mailable { use Queueable,SerializesModels; public $user;public $loginTime;
 public function __construct($user) {$this->user=$user;$this->loginTime=now()->format('d/m/Y H:i');}
 public function build() {return $this->subject('Alerta de inicio de sesión')->view('emails.login-alert');}
}
