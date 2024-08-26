<?php

require_once '../datos/IDAO.php';
require_once '../modelo/Cargadores.class.php';

class CargadoresDAO implements IDAO {

    private $dbh;

    public function __construct() {
        try {
            $dbname = "lp3_2024_is";
            $dsn = 'mysql:host=localhost;port=3306;dbname=' . $dbname;
            $username = 'root';
            $password = '';
            $this->dbh = new PDO($dsn, $username, $password);
            $this->dbh->setAttribute(
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function listar($where) {
        $stmt = $this->dbh->prepare("SELECT * FROM cargadores " . $where);
        $stmt->execute();
        $linea = $stmt->fetchAll(PDO::FETCH_OBJ);
        $lista = [];
        foreach ($linea as $key => $value) {
            $lista[$key] = $value;
        }
        return $lista;
    }

    public function insertar($obj) {

        $marca = $obj->getMarca();
        $descripcion = $obj->getDescripcion();
        $precio = $obj->getPrecio();

        $stmt = " INSERT INTO cargadores "
                . "(marca, descripcion, precio) "
                . "VALUES "
                . "( :marca, :descripcion, :precio )";
        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue(':marca', $marca, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':precio', $precio, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function modificar($obj) {
        $id = $obj->getId();
        $marca = $obj->getMarca();
        $descripcion = $obj->getDescripcion();
        $precio = $obj->getPrecio();

        $stmt = "UPDATE cargadores SET "
                . "marca=:marca, descripcion=:descripcion, precio=:precio "
                . "WHERE id=:id ";

        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue(':marca', $marca, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':precio', $precio, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function eliminar($obj) {
        $id = $obj->getId();
        $stmt = "DELETE FROM cargadores WHERE id=:id";
        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}

?>