<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Maestro
{
    private $conexion;

    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function all()
    {

        $query = "SELECT usuarios.id, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.direccion, usuarios.nacimiento, materias.materia FROM usuarios LEFT JOIN materias ON materias.id = usuarios.materia_id WHERE usuarios.rol_id = 2";


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function materias()
    {

        $query = 'SELECT * FROM materias';


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function update($nombre, $apellido, $email, $direccion, $nacimiento, $id)
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, direccion = ? ,nacimiento = ? WHERE id = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$nombre, $apellido, $email, $direccion, $nacimiento, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


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
