<?php namespace App\Mailers;

use App\Contact;

class ContactMailer extends Mailer
{

    public function sendContact(Contact $user)
    {
        $view = 'emails.contact';
        $data = [
            'name'    => $user->name,
            'email'   => $user->email,
            'content' => $user->message
        ];
        $subject = 'Solicitud de contacto de ' . $user->name;
        $user->setEmail('ingresotec@gmail.com');
        $this->sendTo($user, $subject, $view, $data);
    }
}