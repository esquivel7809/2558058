<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>lista de usuarios de la tabla</h1>
            <?php
                $insert = $con->prepare('SELECT * FROM user LEFT JOIN tip_use ON user.id_tip_user = tip_use.id_tip_use');
                $insert->execute();
                $resultado1 = $insert->fetchAll(PDO::FETCH_ASSOC);  
                $i = 0;          
            ?>

            <table border="1">
                <tr>
                    <td>#</td>
                    <td>Doc</td>
                    <td>Nombres</td>
                    <td>Correo</td>
                    <td>Tipo Usuario</td>
                    <td>Estado</td>
                    <td>Eliminar</td>
                    <td>Editar</td>
                </tr>
                <?php foreach ($resultado1 as $row)
                { 
                    $i++; ?>

                    <?php
                        if($row["estado"] == "A"){
                            $estado = "Activo";
                        } else {
                            $estado = "Inactivo";
                        }
                    ?>
                    
                    <?php
                        if($estado == "Activo"){
                    ?>
                        <tr style="background-color:green;">
                            <td><?php echo $i?></td>
                            <td><?php echo $row['doc'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo "" ?></td>
                            <td><?php echo "" ?></td>
                            <td><?php echo $estado ?></td>
                            <td>
                                <a href="" onClick="window.open
                                ('eliminar.php?cod=<?php echo $row['doc'] ?>','width= 830,height=750,toolbar=NO');void(null);"><img src="img/eliminar.png" height="24" width="24"></a>
                            </td>
                            <td>
                                <a href="#"><img src="img/editar.png" width="25px" height="5%">
                                </a>
                            </td>
                        </tr>
                    <?php } else {?>
                        <tr style="background-color:salmon;">
                            <td><?php echo $i?></td>
                            <td><?php echo $row['doc'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo ""?></td>
                            <td><?php echo ""?></td>
                            <td><?php echo $estado ?></td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                <?php }}?>
            </table>
</body>
</html>