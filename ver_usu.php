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
            $insert = $con->prepare('SELECT * FROM user LEFT JOIN tip_use ON user.id_tip_user = tip_use.id_tip_use order by estado');
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
                if ($row['estado'] == 1) {
                    $estado = "activo";
                }else{
                    $estado="inactivo";
                }
                $i++; 
                if ($estado == 'activo'){
            ?>     
            <tr style="font-family:Georgia, 'Times New Roman', Times, serif, sans-serif; background: hwb(334 41% 22%);">
                <td><?php echo $i?></td>
                <td><?php echo $row['doc'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['tip_use'] ?></td>
                <td><?php echo $estado ?></td>
                <td>
                    <a href="" onClick="window.open
                    ('eliminar.php?cod=<?php echo $row['doc'] ?>','width= 830,height=750,toolbar=NO');void(null);"><img src="img/eliminar.png" height="24" width="24"></a>
                </td>
                <td>
                    <a href="#"><img src="img/editar.png" width="25px" height="5%">
                    </a>
                </td>
                <td>
                    <div class="col-4">
                        <a href="" class="text-danger" onclick="window.open('selects/comunicaciones.php?id=<?php echo '3'?>','','width= 1200,height=880');void(null);"><strong>  Comunicaciones</strong></a>
                    </div> 
                </td>
            </tr>
            <?php
            }else{?>
            <tr style="font-family:Verdana, Geneva, Tahoma, sans-serif, sans-serif; font-size: 10px; background: hwb(189 32% 40%);">
                <td><?php echo $i?></td>
                <td><?php echo $row['doc'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['tip_use'] ?></td>
                <td><?php echo $estado ?></td>
                <td>
                    <a href="" onClick="window.open
                    ('eliminar.php?cod=<?php echo $row['doc'] ?>','width= 830,height=750,toolbar=NO');void(null);"><img src="img/eliminar.png" height="24" width="24"></a>
                </td>
                <td>
                    <a href="#"><img src="img/editar.png" width="25px" height="5%">
                    </a>
                </td>
                <td>
                    <div class="col-4">
                        <a href="" class="text-danger" onclick="window.open('selects/comunicaciones.php?id=<?php echo '3'?>','','width= 1200,height=880');void(null);"><strong>  Comunicaciones</strong></a>
                    </div> 
                </td>
            </tr>
            <?php
            }
            }?>
            </table>
</body>
</html>