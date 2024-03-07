<?php 
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

?>

<?php 
$documento = $_GET['cod'];

$sql = $con->prepare("SELECT * FROM user WHERE doc = $documento");
$sql->execute();
$resultado1 = $sql->fetch(PDO::FETCH_ASSOC);  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MODULO ELIMINAR EL REGISTRO DE <?php  echo $resultado1['name']; ?></h1>
           

            <table border="1">
                <tr>
                    <td>#</td>
                    <td>Doc</td>
                    <td>Nombres</td>
                    <td>Correo</td>
                    <td>Tipo Usuario</td>
                    <td>Estado</td>
                    <td>Eliminar</td>
                    
                </tr>
                                
                    <tr>
                    <td>1</td>
                    <td><?php echo $resultado1['doc'] ?></td>
                    <td><?php echo $resultado1['name'] ?></td>
                    <td><?php echo $resultado1['email'] ?></td>
                    <td><?php echo $resultado1['id_tip_user'] ?></td>
                    <td><?php echo $resultado1['estado'] ?></td>



                    <td>
                        Eliminar
                    </td>


                    
                   
                </tr>

    
               
            </table>
</body>
</html>