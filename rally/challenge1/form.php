<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/estilos.css">    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>


<?php
// Consultar la base de datos
$con = mysqli_connect("127.0.0.1","root","","rally") or die ("Error de conexion");
$consulta = "SELECT * FROM `carrera`";
$ejecutar = mysqli_query($con,$consulta);

 ?>


<body class="registrarse">
   
<div class="container">
<div class="row-fluid">
  <form method = "POST" action = "form.php" class="form-horizontal">
	<fieldset>
	  <div id="legend">
		<legend class="">Matricularse</legend>
	  </div>
 
	 
	  <div class="control-group">
		<label class="control-label"  for="cedula">Cedula</label>
		<div class="controls">
		  <input type="text" id="cedula" name="cedula" placeholder="" class="input-xlarge" required>
		</div>
	  </div>
 
	 
	  <div class="control-group">
		<label class="control-label" for="nombre">Nombre</label>
		<div class="controls">
		  <input type="text" id="nombre" name="nombre" placeholder="" class="input-xlarge" required>
		</div>
	  </div>

	   
	   <div class="control-group">
		<label class="control-label"  for="apellidos">Apellidos</label>
		<div class="controls">
		  <input type="text" id="apellidos" name="apellidos" placeholder="" class="span2" required>
		</div>
	  </div>

	 
	  <div class="control-group">
		<label class="control-label" for="carrera">Carrera</label>
		<div class="controls">
		<select class="" name="carrera" id="carrera">
			<?php
			while ($fila = mysqli_fetch_array($ejecutar)) {
				echo "<option >".$fila["nombre"]."</option>"; 				
			}
			?>
			</select>
		</div>			
	  </div>
	 <br>

	  <!-- Submit -->
	  <div class="control-group">
		<div class="controls">
		<input type="submit" name="insert" value =" Registrarse" >
		</div>
	  </div>	   

	 <?php
		if(isset($_POST['insert'])){
			$cedula = $_POST['cedula'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellidos'];
			$carrera = $_POST['carrera'];

		$insert = "INSERT INTO estudiante(cedula, nombre,apellidos) VALUES ('$cedula','$nombre','$apellido')";

		$insertar = "INSERT INTO estudiante_carrera(id_carrera, id_estudiante) VALUES ('$carrera','$cedula')";

		$ejecutar = mysqli_query($con, $insert);
		$ejecuta = mysqli_query($con, $insertar);
		if($ejecutar && $ejecuta){
		echo "<h3> Registrado con exito</h3>";
		}

		}

	?>
 
	</fieldset>
  </form>
</div>
</div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>