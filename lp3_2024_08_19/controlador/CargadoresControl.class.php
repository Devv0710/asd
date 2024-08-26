<?php

require_once '../datos/IDAO.php';
require_once '../datos/CargadoresDAO.class.php';

class CargadoresControl implements IDAO {

    private $reg;

    public function __construct() {
        $this->reg = new CargadoresDAO();
    }

    public function listar($where) {
        return $this->reg->listar($where);
    }

    public function insertar($obj) {
        $this->reg->insertar($obj);
    }

    public function modificar($obj) {
        $this->reg->modificar($obj);
    }

    public function eliminar($obj) {
        $this->reg->eliminar($obj);
    }
}
