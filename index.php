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
	<div class="tabla">
		<table>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
			</tr>
			<?php
			$consulta="SELECT * FROM alta";
			$ejecutarConsulta=mysqli_query($enlace, $consulta);
			$verFilas=mysqli_num_rows($ejecutarConsulta);
			$fila=mysqli_fetch_array($ejecutarConsulta);
			if (!$ejecutarConsulta) {
				echo "Error en la consulta";
				# code...
			}else{
				if ($verFilas<1) {
					echo "<tr><td>Sin registros</td></tr>";
				}else{
					for ($i=0; $i <=$fila ; $i++) { 
						echo '
						<tr>
							<td>'.$fila[1].'</td>
							<td>'.$fila[0].'</td>
							
						</tr>';
						$fila=mysqli_fetch_array($ejecutarConsulta);
					}
				}
			}
			?>
		</table>
	</div>
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