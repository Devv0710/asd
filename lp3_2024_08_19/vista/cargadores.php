<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cargadores</title>
        <style>

            th{
                background-color: gray;
                color: white;
            }
            i.fa-pencil{
                color: white;
            }
        </style>
    </head>

    <?php
    include_once '../controlador/CargadoresControl.class.php';
    $cargadoresControl = new CargadoresControl();
    ?>    

    <body>
        <h1 align="center">Cargadores</h1>
        <?php
        $reg = null;
        if (isset($_GET['reg'])) {
            $reg = $_GET['reg'];
        }
        if (!$reg) {
            ?>
            <table align="center" width="95%" border="1">

                <tr>
                    <th>ID</th>
                    <th>MARCA</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                    <th colspan="2">
                        <a href="?reg=si">
                            NUEVO
                        </a>
                    </th>
                </tr>
                <?php
                $cargadoresLista = $cargadoresControl->listar("");
                for ($i = 0; $i < count($cargadoresLista); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $cargadoresLista[$i]->id; ?></td>                                
                        <td><?php echo $cargadoresLista[$i]->marca; ?></td>                                
                        <td><?php echo $cargadoresLista[$i]->descripcion; ?></td>                                
                        <td><?php echo $cargadoresLista[$i]->precio; ?></td>                                
                        <td align="center" width="50px">
                            <a href="?reg=si&id=<?php echo $cargadoresLista[$i]->id; ?>">
                                Mod
                            </a>
                        </td>                
                        <td align="center" width="50px">
                            <a href="../sesiones/CargadoresSesion.php?del=si&id=
                               <?php echo $cargadoresLista[$i]->id; ?>">
                                Elim
                            </a>

                        </td>                
                    </tr>
                    <?php
                }
                ?>    
            </table>

            <?php
        } else {   // if (!$reg) {
            $id = '';
            $marca = '';
            $descripcion = '';
            $precio = '';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $cargadoresLista = $cargadoresControl->listar("WHERE id=$id");
                $marca = $cargadoresLista[0]->marca;
                $descripcion = $cargadoresLista[0]->descripcion;
                $precio = $cargadoresLista[0]->precio;
            }
            ?> 
            <form method="POST" action="../sesiones/CargadoresSesion.php">
                <table border="1" align="center">
                    <tr>
                        <td>Marca</td>
                        <td><input type="text" name="marca" value="<?php echo $marca; ?>" /></td>
                    </tr>

                    <tr>
                        <td>Descripcion</td>
                        <td><input type="text" name="descripcion" value="<?php echo $descripcion; ?>" /></td>
                    </tr>

                    <tr>
                        <td>Precio</td>
                        <td><input type="text" name="precio" value="<?php echo $precio; ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" style="width: 100%; background-color: greenyellow; " />
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <a href="?"> Cancelar </a>
                        </td>
                    </tr>
                </table>            
            </form>       
            <?php
        } // else { if (!$reg)
        ?>    
    </body>
</html>
