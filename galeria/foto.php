<?php 

	require "funciones.php";

	$conexion = conexion_bd('desarrolloweb', 'root', '');

	if(!$conexion)
	{
		die();
	}

	$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

	if (!$id) {
		header('Location: index.php');
	}

	$sqlFoto = $conexion->prepare("SELECT * FROM tbl_fotos WHERE PK_idFoto = :id");
	$sqlFoto->execute(array(':id' => $id));

	$foto = $sqlFoto->fetch();

	if(!$foto)
	{
		header('Location: index.php');
	}

	require "views/foto.view.php";
 ?>