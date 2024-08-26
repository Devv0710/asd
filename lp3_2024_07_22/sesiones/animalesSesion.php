<?php
include_once '../modelo/Animales.class.php';
include_once '../controlador/AnimalesCtrl.class.php';

$animalesCtrl = new AnimalesCtrl();

$id = $_POST['id'];
if( isset($_GET['id']) )
    $id = $_GET['id'];

$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$peso = $_POST['peso'];

$animalesObj = new Animales($id, $nombre, $raza, $peso);

$mns = '';
if (!$id) { // insertar
    $animalesCtrl->insertar($animalesObj);
    $mns = 'Insertado ';
} else { // modif O elim
    if (!isset($_GET['del'])) {
        $animalesCtrl->modificar($animalesObj);
        $mns = 'Modificado';
    } else {
        $animalesCtrl->eliminar($animalesObj);
        $mns = 'Eliminado';
    }
}
?>
<script type="text/javascript">
    alert('<?php echo $mns; ?> con exito.!');
    location.href = '../vista/animales.php';
</script>