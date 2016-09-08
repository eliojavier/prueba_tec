<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 06/08/16
 * Time: 09:45 PM
 */

namespace App;


class Contact
{

    public $name;
    public $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public $message;

    /**
     * Contact constructor.
     * @param $name
     * @param $email
     * @param $message
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }


}