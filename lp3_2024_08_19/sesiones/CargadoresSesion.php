<?php
include_once '../modelo/Cargadores.class.php';
include_once '../controlador/CargadoresControl.class.php';

$cargadoresControl = new CargadoresControl();

$id = $_POST['id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$cargadoresObj = new Cargadores($id, $marca, $descripcion, $precio);

$mns = '';
if (!$id) { // insertar
    $cargadoresControl->insertar($cargadoresObj);
    $mns = 'Insertado';
} else { //mod o elim
    if (!isset($_GET['del'])) {
        $cargadoresControl->modificar($cargadoresObj);
        $mns = 'Modificado';
    } else {
        $cargadoresControl->eliminar($cargadoresObj);
        $mns = 'Eliminado';
    }
}
?>
<script type="text/javascript">
    alert('<?php echo $mns; ?> con exito.!');
    location.href = '../vista/cargadores.php';
</script>

