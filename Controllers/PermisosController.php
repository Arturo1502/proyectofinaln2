<?php

use Models\Roles;
use Models\Permisos;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class PermisosController
{
    //llamar todos los datos para cargar la tabla
    public function index()
    {
        $clientes = new Permisos;

        $data = $clientes->all();

        $roles = $clientes->roles();



        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/tablaPermisos.php';
    }



    public function update()
    {

        $email = $_POST['email'];
        $rol_id = $_POST['rol_id'];
        $status_actual = $_POST['status_actual'];
        $nuevo_status = ($status_actual == 1) ? 0 : 1; // Cambiar el estado: si es 1, poner 0; si es 0, poner 1

        $cliente = new Permisos;
        $cliente->updateRol($email, $rol_id, $nuevo_status);


        header('location: ../index.php?controller=PermisosController&action=index');
    }
}
