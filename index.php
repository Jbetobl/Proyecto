<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$basededatos="formulario";
	$enlace=mysqli_connect($servidor,$usuario,$clave,$basededatos);
	if(!$enlace)
	{
		echo "Error en la conexion con el servidor";
	}
 ?>
 <!DOCTYPE html>
 <html>
	<meta charset="utf-8">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=windows-1252">
<TITLE>articulos</TITLE>
<link rel="stylesheet" type="text/css" href="estilo.css">
<BODY>
	<style type="text/css">
		form{
			margin: 0 auto;
			border-radius: 3px;
			width: 300px;
			background-color: orange;
			color: #999;
			padding: 20px;
		}
		input, textarea{
			border: 0;
			outline: none;
			width: 280px;
		}
		.field{
			border: solid 1px #ccc;
			padding: 10px;
			

		}
	</style>
	<form action="" class="formulario" id="formulario" name="formulario" method="POST">
		<p>Nombre:</p>
		<input type="text" name="Nombre" class="field"> <br/>
		<p>Correo electrónico</p>
		<input type="text" name="Correo" class="field"> <br/>
		<p class="center-content">
			<input type="submit" class="btn btn-orange" name="registrarse" value="Enviar datos">
		</p>
		
	</form>
</BODY>
</HTML>
<?php
if (isset($_POST['registrarse'])) {
	$Nombre=$_POST["Nombre"];
	$Correo=$_POST["Correo"];
	$insertarDatos="INSERT INTO alta VALUES('$Nombre',
	                                        '$Correo')";
	$ejecutarInsertar=mysqli_query($enlace, $insertarDatos);
	if (!$ejecutarInsertar) {
		echo "Error";
	}

	# code...
}
?>