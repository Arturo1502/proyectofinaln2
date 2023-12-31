<?php

use Models\Roles;
use Models\Maestro;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class MaestroController
{

    public function index()
    {
        $clientes = new Maestro;

        $data = $clientes->all();

        $materias = $clientes->materias();


        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/tablaMaestros.php';
    }


    public function updateView()
    {
        $roles = new Roles;
        $data = $roles->all();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/update.php';
    }


    public function update()
    {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $nacimiento = $_POST['nacimiento'];




        $cliente = new Maestro;

        $cliente->update($nombre, $apellido, $email, $direccion, $nacimiento, $id);


        header('location: ../index.php?controller=MaestroController&action=index');
    }


    public function destroy()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];


            $usuario = new Maestro;
            $usuario->delete($id);


            header('location: ../index.php?controller=MaestroController&action=index');
        }
    }
}
