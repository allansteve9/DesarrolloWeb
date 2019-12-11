<?php 
	
	require "funciones.php";
	
	$conexion = conexion_bd('desarrolloweb', 'root', '');

	if(!$conexion)
	{
		//header('Location: error.php');
		die();
	}

	if( ($_SERVER['REQUEST_METHOD']=='POST') && (!empty($_FILES)) )
	{
		$check = @getimagesize($_FILES['foto']['tmp_name']);
		if ($check != false) {
			$carpeta_fotos = 'img/';
			$imagen_cargada = $carpeta_fotos . $_FILES['foto']['name'];
			move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_cargada);

			$sqlInsertarFoto = $conexion->prepare('
				INSERT INTO tbl_fotos(PK_idUsuario, nombre_foto, descripcion_foto, ruta_foto, estado_foto, FK_idCategoria)
				VALUES (:codigo, :nombre, :descripcion, :ruta, :estado, :categoria)');

			$sqlInsertarFoto->execute(array(
				':codigo' => 'allan',
				':nombre' => $_POST['titulo'],
				':descripcion' => $_POST['texto'],
				':ruta' => $_FILES['foto']['name'],
				':estado' => 1,
				':categoria' => $_POST['categoria']
			));

			header('Location: index.php');
		}
		else
		{
			$error = "El archivo no es una imagen o no es soportado";
		}
	}

	require "views/subir.view.php"
 ?>