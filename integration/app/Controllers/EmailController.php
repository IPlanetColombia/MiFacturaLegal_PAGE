<?php


namespace App\Controllers;

use Config\Services;
use App\Controllers\BaseController;

class EmailController extends BaseController
{
    protected $email;

    public function __construct()
    {
        $this->email = Services::email();
    }

    public function send($from, $name, $to, $subject, $message, $archivos = [])
    {
        $email = Services::email();
        $email->setFrom('soporte@mifacturalegal.com', 'Mifacturalegal');
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);
        foreach ($archivos as $key) {
            $email->attach($key);
        }
        $email->send();

    }
}