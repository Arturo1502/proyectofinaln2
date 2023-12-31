<?php

use Models\Roles;
use Models\LoginMaestro;
use Models\Auth;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class LoginMaestroController
{
    public function index()
    {
        $clientes = new LoginMaestro();
        
        
        

            require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/maestros.php';
        
    }
}
