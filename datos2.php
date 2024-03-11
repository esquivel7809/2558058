<?php 
    $conexion=mysqli_connect('localhost','root','','login');
 

    $trans=$_POST['trans'];
/*****************************************  CONSULTA DE LOS DATOS ***************************************/


    $sql="SELECT animal.id_ani, animal.animal FROM animal 
    INNER JOIN especie ON animal.id_esp = especie.id_esp 
    WHERE especie.id_esp = '$trans'
    ORDER BY especie.especie ";

    $result=mysqli_query($conexion,$sql);
	$cadena="<label>Instructor</label><br> 
			<select id='docu' name='name'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>