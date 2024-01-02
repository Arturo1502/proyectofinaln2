<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Materia
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

        $query = "SELECT materias.id, materias.materia, usuarios.nombre, usuarios.apellido
        FROM usuarios
        RIGHT JOIN materias ON materias.id = usuarios.materia_id";



        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function maestros()
    {

        $query = 'SELECT * FROM usuarios WHERE rol_id = 2';


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function maestrosSinasignar()
    {

        $query = 'SELECT * FROM usuarios WHERE rol_id = 2 AND materia_id IS NULL';


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

        $query = 'SELECT * FROM materias WHERE rol_id = 2';


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


    public function encontrar($materia, $maestro_id)
    {

        $query = "SELECT `id` FROM materias WHERE materia=?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$materia]);
            $result = $stm->fetch(\PDO::FETCH_ASSOC);

            if ($result) {

                $materia_id = $result['id'];
                $this->update($materia_id, $maestro_id);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }



    //actualizar un usuario
    public function update($materia_id, $id)
    {
        $query = "UPDATE usuarios SET materia_id = ?  Where id=? ";
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$materia_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function null($id)
    {
        $query = "UPDATE usuarios SET materia_id = NULL  Where id= ?";
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    //eliminar un usuario
    public function delete($id)
    {

        $query = 'DELETE FROM materias WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function register($materia, $user_id)
    {
        $query = "INSERT INTO materias(materia) VALUES (?)";


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$materia]);
            if ($user_id) {
                $last_id = $this->conexion->lastInsertId();
                $this->update($last_id, $user_id);
            }
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getMateriaRelacionada($materiaId)
    {
        // Realiza una consulta para obtener la información de la materia
        $query = "SELECT * FROM materias WHERE id = :materia_id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':materia_id', $materiaId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
