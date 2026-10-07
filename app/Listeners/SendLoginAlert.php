<?php
namespace App\Listeners;
use Illuminate\Auth\Events\Login; use Illuminate\Support\Facades\Mail; use App\Mail\LoginAlertMail;
class SendLoginAlert { public function handle(Login $event) {
 if(request()->routeIs('register.store')) return;
 Mail::to($event->user->email)->send(new LoginAlertMail($event->user));
} }
