<?php

class Muebles {

    private $id;
    private $descripcion;
    private $color;
    private $precio;

    public function __construct($id, $descripcion, $color, $precio) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->color = $color;
        $this->precio = $precio;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getColor() {
        return $this->color;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}

?>