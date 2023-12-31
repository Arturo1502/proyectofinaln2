<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Permisos
{
    private $conexion;

    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    // cargar todo los usuarios
    public function all()
    {

        $query = "SELECT * FROM `usuarios`";


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function roles()
    {

        $query = 'SELECT * FROM roles';


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // encontrar el usuario donde el id se igual a ?

    public function find($id)
    {

        $query = 'SELECT * FROM usuarios Where id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateRol($email, $rol_id, $nuevo_status)
    {
        $query = "UPDATE usuarios SET rol_id = ?, status = ? WHERE email = ?";
    
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$rol_id, $nuevo_status, $email]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    //eliminar un usuario
    public function delete($id)
    {

        $query = 'DELETE FROM `usuarios` WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
