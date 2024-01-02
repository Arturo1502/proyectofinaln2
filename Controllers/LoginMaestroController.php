<?php

use Models\Roles;
use Models\LoginMaestro;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class LoginMaestroController{

    public function index()
    {
        $clientes = new LoginMaestro;

        $data = $clientes->all();




        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/maestros.php';
    }
}