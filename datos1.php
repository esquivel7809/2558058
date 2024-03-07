<?php 
    $conexion=mysqli_connect('localhost','root','','login');
 

    $trans=$_POST['trans'];
/*****************************************  CONSULTA DE LOS DATOS ***************************************/


    $sql="SELECT competencia.id_compe, competencia.competencia FROM competencia 
    INNER JOIN transversal ON transversal.id_transv = competencia.id_transv 
    WHERE competencia.id_transv = '$trans' 
    ORDER BY competencia.competencia ";

    $result=mysqli_query($conexion,$sql);
	$cadena="<label>Instructor</label><br> 
			<select id='id_compe' comp='competencia'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>