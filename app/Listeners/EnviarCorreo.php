<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertaLoginCorreo;

class EnviarCorreo
{
    public function handle(Login $event): void
    {
        $user = $event->user;

        Mail::to($user->email)->send(new AlertaLoginCorreo($user));
    }
}