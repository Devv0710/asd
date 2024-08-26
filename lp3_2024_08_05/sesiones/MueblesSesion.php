<?php
include_once '../modelo/Muebles.class.php';
include_once '../controlador/MueblesCtrl.class.php';

$mueblesCtrl = new MueblesCtrl();

$id = $_POST['id']; // formulario

if (isset($_GET['id'])) {// url 
    $id = $_GET['id'];
}

$descripcion = $_POST['descripcion'];
$color = $_POST['color'];
$precio = $_POST['precio'];

$mueblesObj = new Muebles($id, $descripcion, $color, $precio);

$mns = '';
if (!$id) { // insertar
    $mueblesCtrl->insertar($mueblesObj);
    $mns = 'Insertado';
} else { //mod o elim
    if (!isset($_GET['del'])) {
        $mueblesCtrl->modificar($mueblesObj);
        $mns = 'Modificado';
    } else {
        $mueblesCtrl->eliminar($mueblesObj);
        $mns = 'Eliminado';
    }
}
?>
<script type="text/javascript">
    alert('<?php echo $mns; ?> con exito.!');
    location.href = '../vista/muebles.php';
</script>

