<?php

class Animales{
    
    private $id;
    private $nombre;
    private $raza;
    private $peso;
    
    public function __construct($id, $nombre, $raza, $peso) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->peso = $peso;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setRaza($raza): void {
        $this->raza = $raza;
    }

    public function setPeso($peso): void {
        $this->peso = $peso;
    }


}

?>
