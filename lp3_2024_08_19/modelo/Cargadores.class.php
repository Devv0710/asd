<?php

class Cargadores {

    private $id;
    private $marca;
    private $descripcion;
    private $precio;

    public function __construct($id, $marca, $descripcion, $precio) {
        $this->id = $id;
        $this->marca = $marca;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public function getId() {
        return $this->id;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}

?>