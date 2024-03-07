<?php 
    $conexion=mysqli_connect('localhost','root','','login');
 

    $trans=$_POST['trans'];
/*****************************************  CONSULTA DE LOS DATOS ***************************************/


    $sql="SELECT user.doc, user.name FROM asig_transv 
    INNER JOIN user ON asig_transv.doc_trans = user.doc 
    INNER JOIN transversal ON asig_transv.id_transv = transversal.id_transv 
    WHERE user.id_tip_user = 3 
    AND transversal.id_transv = '$trans'
    ORDER BY transversal.transversal ";

    $result=mysqli_query($conexion,$sql);
	$cadena="<label>Instructor</label><br> 
			<select id='docu' name='name'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>