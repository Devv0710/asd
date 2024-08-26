<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
              integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
              crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Muebles</title>
        <style>
            body {
                background-color: forestgreen;
                color: white;
                font-family: Arial, sans-serif;
            }
            th {
                background-color: #246355;
                color: white;
            }
            a {
                color: white;
                text-decoration: none;
            }
            i.fa-pencil {
                color: white;
            }
            table {
                margin: 20px auto;
                width: 95%;
                border-collapse: collapse;
            }
            td, th {
                border: 1px solid white;
                padding: 8px;
                text-align: center;
            }
            form {
                width: 50%;
                margin: 20px auto;
                border: 1px solid white;
                padding: 20px;
                background-color: #2e6e50;
            }
            input[type="text"] {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: greenyellow;
                border: none;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: yellowgreen;
            }
        </style>
    </head>
    <body>
        <h1 align="center">Muebles</h1>

        <?php
        include_once '../controlador/MueblesCtrl.class.php';
        $mueblesCtrl = new MueblesCtrl();

        $reg = isset($_GET['reg']) ? $_GET['reg'] : null;

        if (!$reg) {
            $mueblesLista = $mueblesCtrl->listar("");

            echo '<table>';
            echo '<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Raza</th>
                <th>Peso</th>
                <th colspan="2">
                    <a href="?reg=si">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </th>
              </tr>';

            foreach ($mueblesLista as $mueble) {
                echo '<tr>
                    <td>' . htmlspecialchars($mueble->id) . '</td>
                    <td>' . htmlspecialchars($mueble->descripcion) . '</td>
                    <td>' . htmlspecialchars($mueble->color) . '</td>
                    <td>' . htmlspecialchars($mueble->precio) . '</td>
                    <td align="center" width="50px">
                        <a href="?reg=si&id=' . htmlspecialchars($mueble->id) . '">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                    </td>
                    <td align="center" width="50px">
                        <a href="../sesiones/MueblesSesion.php?del=si&id=' . htmlspecialchars($mueble->id) . '">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                  </tr>';
            }

            echo '</table>';
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $descripcion = $color = $precio = '';

            if ($id) {
                $mueblesLista = $mueblesCtrl->listar("WHERE id=$id");
                if (count($mueblesLista) > 0) {
                    $descripcion = htmlspecialchars($mueblesLista[0]->descripcion);
                    $color = htmlspecialchars($mueblesLista[0]->color);
                    $precio = htmlspecialchars($mueblesLista[0]->precio);
                }
            }
            ?>

            <form method="POST" action="../sesiones/mueblesSesion.php">
                <table>
                    <tr>
                        <td>Descripcion</td>
                        <td><input type="text" name="descripcion" value="<?php echo $descripcion; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Color</td>
                        <td><input type="text" name="color" value="<?php echo $color; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td><input type="text" name="precio" value="<?php echo $precio; ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Guardar" />
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <a href="?">Cancelar</a>
                        </td>
                    </tr>
                </table>            
            </form>       

        <?php } ?>
    </body>
</html>
