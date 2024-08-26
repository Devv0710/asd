<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
    include_once '../controlador/AnimalesCtrl.class.php';
    $animalesCtrl = new AnimalesCtrl();
    ?>
    <body>


        <h1 align="center">Animales</h1>

        <?php
        $reg = null;
        if (isset($_GET['reg']))
            $reg = $_GET['reg'];

        if (!$reg) {
            ?>

            <table align="center" width="95%" border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Peso</th>
                    <th colspan="2">
                        <a href="?reg=si">
                            NUEVO
                        </a>
                    </th>
                </tr>
                <?php
                $animalesLista = $animalesCtrl->listar("");
                for ($i = 0; $i < count($animalesLista); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $animalesLista[$i]->id; ?></td>
                        <td><?php echo $animalesLista[$i]->nombre; ?></td>
                        <td><?php echo $animalesLista[$i]->raza; ?></td>
                        <td><?php echo $animalesLista[$i]->peso; ?></td>
                        <td align="center" width="50px"> 
                            <a href="?reg=si&id=<?php echo $animalesLista[$i]->id; ?>">
                                Mod
                            </a>
                        </td>
                        <td align="center" width="50px"> 
                            <a href="../sesiones/animalesSesion.php?del=si&id=<?php echo $animalesLista[$i]->id; ?>">
                                Del                                 
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>

            <?php
        } else {
            $id = '';
            $nombre = '';
            $raza = '';
            $peso = '';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $animalesLista = $animalesCtrl->listar("WHERE id=$id");
                //var_dump($animalesLista);
                $nombre = $animalesLista[0]->nombre;
                $raza = $animalesLista[0]->raza;
                $peso = $animalesLista[0]->peso;
            }
            ?>

            <form method="POST" action="../sesiones/animalesSesion.php" >
                <table border="1" align="center">
                    <tr>
                        <td>Nombre</td>
                        <td>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Raza</td>
                        <td>
                            <input type="text" name="raza" value="<?php echo $raza; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>
                            <input type="text" name="peso" value="<?php echo $peso; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" 
                                   style="width: 100%; background-color: yellow; " />
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <a href="?">
                                Cancelar
                            </a>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
        }
        ?>


    </body>
</html>
