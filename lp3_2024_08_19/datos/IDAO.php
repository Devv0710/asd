<?php

interface IDAO {

    function listar($where);

    function insertar($obj);

    function modificar($obj);

    function eliminar($obj);
}

?>