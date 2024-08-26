<?php

require_once 'IDAO.php';
require_once '../modelo/Animales.class.php';

class AnimalesDAO implements IDAO {

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
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function listar( $where ) {
        
        $stmt = $this->dbh->prepare("SELECT * FROM animales ".$where );
        $stmt->execute();
        $linea = $stmt->fetchAll(PDO::FETCH_OBJ);
        $lista = array();
        foreach ( $linea as $key => $value ){
            $lista[$key] = $value;
        }
        return $lista;
        
    }

    public function insertar( $obj ) {
        
        $nombre = $obj->getNombre();
        $raza = $obj->getRaza();
        $peso = $obj->getPeso();
        
        $stmt = "INSERT INTO animales "
                . "(nombre, raza, peso) "
                . "VALUES "
                . "( :nombre, :raza, :peso )";
        $stmt = $this->dbh->prepare( $stmt );
        $stmt->bindValue( ':nombre', $nombre, PDO::PARAM_STR );
        $stmt->bindValue( ':raza', $raza, PDO::PARAM_STR );
        $stmt->bindValue( ':peso', $peso, PDO::PARAM_STR);
        $stmt->execute();
        
    }

    public function modificar( $obj ) {
        
        $id = $obj->getId();
        $nombre = $obj->getNombre();
        $raza = $obj->getRaza();
        $peso = $obj->getPeso();
        
        $stmt = "UPDATE animales SET "
                . "nombre=:nombre, raza=:raza, peso=:peso "
                . "WHERE id=:id";
        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue( ':nombre', $nombre, PDO::PARAM_STR );
        $stmt->bindValue( ':raza', $raza, PDO::PARAM_STR );
        $stmt->bindValue( ':peso', $peso, PDO::PARAM_STR);
        $stmt->bindValue( ':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        
    }
    
    public function eliminar( $obj ) {
        
        $id = $obj->getId();
        $stmt = "DELETE FROM animales WHERE id=:id";
        $stmt = $this->dbh->prepare($stmt);
        $stmt->bindValue( ':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        
    }

}

?>
