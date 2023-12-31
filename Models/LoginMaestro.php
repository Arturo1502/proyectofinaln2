<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class LoginMaestro {
    private $conexion;

    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function all($email)
    {

        $query = "SELECT usuarios.id, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.direccion, usuarios.nacimiento, materias.materia FROM usuarios LEFT JOIN materias ON materias.id = usuarios.materia_id WHERE usuarios.email = ?";


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email]);
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


}