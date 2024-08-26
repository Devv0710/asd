<?php

require_once 'IDAO.php';
require_once '../modelo/Muebles.class.php';

class MueblesDAO implements IDAO {

    private $dbh;

    public function __construct() {
        try {
            $dbname = 'lp3_2024_is';
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
        $stmt = $this->dbh->prepare("SELECT * FROM muebles " . $where);
        $stmt->execute();
        $linea = $stmt->fetchAll(PDO::FETCH_OBJ);
        $lista = [];
        foreach ($linea as $key => $value) {
            $lista[$key] = $value;
        }
        return $lista;
    }

    public function insertar($obj) {
        $descripcion = $obj->getDescripcion();
        $color = $obj->getColor();
        $precio = $obj->getPrecio();

        $stmt = " INSERT INTO muebles "
                . "(descripcion, color, precio) "
                . "VALUES "
                . "( :descripcion, :color, :precio )";
        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':color', $color, PDO::PARAM_STR);
        $stmt->bindValue(':precio', $precio, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function modificar($obj) {
        $id = $obj->getId();
        $descripcion = $obj->getDescripcion();
        $color = $obj->getColor();
        $precio = $obj->getPrecio();

        $stmt = "UPDATE muebles SET "
                . "descripcion=:descripcion, color=:color, precio=:precio "
                . "WHERE id=:id ";

        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':color', $color, PDO::PARAM_STR);
        $stmt->bindValue(':precio', $precio, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function eliminar($obj) {
        $id = $obj->getId();
        $stmt = "DELETE FROM muebles WHERE id=:id";
        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}

?>