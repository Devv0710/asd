
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $concat = ". Entendieron???";

        $texto01 = "Esto es un texto que puede ser dinamico$concat";
        $texto02 = 'Esto es un texto estatico$concat';
        ?>
        <h3><?php echo $texto01; ?></h3>
        <h3><?php echo $texto02; ?></h3>

        <?php
        $n1 = 5;
        $n2 = 8;
        ?>
        <h2>
            El resultado de la suma entre 
            <?php echo $n1; ?> 
            y 
            <?php echo $n2; ?> 
            es: 
            <?php echo ($n1 + $n2) . ' algo mas'; ?>
        </h2>

        <table border="1">
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <td>3</td>
                <td>3</td>
                <td>3</td>
            </tr>
        </table>

        <table border="1">
            <?php
            for ($j = 1; $j < 11; $j++) {
                ?>
                <tr>
                    <?php
                    for ($i = 1; $i < 8; $i++) {
                        ?>
                        <td><?php echo $j . ',' . $i; ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>


    </body>
</html>
