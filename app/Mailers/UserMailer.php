<?php namespace App\Mailers;

use App\User;
use App\Contact;

class UserMailer extends Mailer
{

    public function sendRegistrationData(User $user)
    {
        $view = 'emails.register';
        $data = [
            'name'  => $user->full_name,
            'email' => $user->email,
            'phone' => $user->phone
        ];
        $subject = 'Registro exitoso espere confirmación';
        $this->sendTo($user, $subject, $view, $data);
    }

    public function sendConfirmation(User $user)
    {
        $view = 'emails.confirmation';
        $data = [];
        $subject = 'Su cuenta fue confirmada ya puede ingresar a la galería';
        $this->sendTo($user, $subject, $view, $data);
    }

    public function sendUserRegistered(User $user)
    {
        $view = 'emails.register';
        $data = [
            'name'  => $user->full_name,
            'email' => $user->email,
            'phone' => $user->phone
        ];
        $subject = 'Nuevo Usuario registrado';

        $user->email = 'ingresotec@gmail.com';
        $this->sendTo($user, $subject, $view, $data);
    }
}