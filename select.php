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
	<title>Validación de Formulario con Javascript</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/css.css">
</head>

<body>
   <main>
        <form  method="POST" autocomplete="off" class="formulario" id="">
            

                <!-- div para capturar el documento -->

                <div class="" id="">
                    <label for="usuario" class="formulario__label">Ficha *</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="ficha" id="ficha" placeholder="Ficha">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__mensaje">
                            El documento tiene que ser de 6 a 11 dígitos y solo puede contener numeros.</p>
                </div>

                <!-- div para capturar el nombre -->

                <div class="" id="">
                    <label for="trans" class="formulario__label">Transversal *</label>
                        <div class="formulario__grupo-select">
                            <select class="formulario__select" name="trans" id="trans" required>
                                <option value="" selected="">** Seleccione Transversal **</option>
                                    <?php
                                        /*Consulta para mostrar las opciones en el select */
                                        $statement = $con->prepare('SELECT * FROM transversal');
                                        $statement->execute();
                                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                          echo "<option value=" . $row['id_transv'] . ">"  . $row['transversal'] . "</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        
                </div>

                                                    
                <div class="" id="">
                <div class="conte" id="select2lista">
                    <label for="docum" class="formulario__label">Instructor *</label>
                        <div class="formulario__grupo-select">
                            <select class="formulario__select" name="docum" id="docum" required>
                                <option value="" selected="">** Seleccione instructor **</option>
                                
                            </select>
                        </div>
                </div>
                </div>                  
                <!-- Grupo: Contraseña 2 -->
                <div class="formulario__grupo" id="">
                    <div class="conte" id="select3lista">
                        <label for="id_com" class="formulario__label">Competencia *</label>
                            <div class="formulario__grupo-select">
                                <select class="formulario__select" name="id_com" id="id_com" required>
                                    <option value="" selected="">** Seleccione Competencia **</option>
                                    

                                </select>
                            </div>
                    </div>
                </div>
        

                <!-- Grupo: Correo Electronico -->
                <div class="" id="grupo__correo">
                    <label for="correo" class="formulario__label">Horario *</label>
                    <div class="formulario__grupo-select">
                                <select class="formulario__select" name="trans" id="trans" required>
                                    <option value="" selected="">** Seleccione Horario **</option>
                                    <option value="1">** 06:00 - 09:00 **</option>
                                    <option value="2">** 09:00 - 11:30 **</option>
                                    <option value="3">** 12:00 - 15:00 **</option>

                                </select>
                            </div>
                    
                </div>

                
                
              

			<div class="formulario__mensaje" id="">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
            
            <p class="text-center">
                      
            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje-exito" id="">Formulario enviado exitosamente!</p>
            </div>
                
        
        </form>
   </main>
   <script src="js/jquery.js"></script>
   <!-- <script src="js/formulario.js"></script> -->
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript para buscar el instructor a partir de la transversal -->

    <script type="text/javascript">
	$(document).ready(function(){
		$('#trans').val(0);
		recargarLista();

		$('#trans').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"trans=" + $('#trans').val(),
			success:function(r){
				$('#docum').html(r);
			}
		});
	}
</script>

<!-- este script nos muestra la competencia de acuerdo a la transversal -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#trans').val(0);
		recargarLista1();

		$('#trans').change(function(){
			recargarLista1();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista1(){
		$.ajax({
			type:"POST",
			url:"datos1.php",
			data:"trans=" + $('#trans').val(),
			success:function(r){
				$('#id_com').html(r);
			}
		});
	}
</script>

</body>

</html>
