<?php 

	require 'funciones.php';

	$fotos_pagina = 12;

	$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p']: 1);
	$inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_pagina - $fotos_pagina : 0;

	$conexion = conexion_bd('desarrolloweb', 'root', '');

	if(!$conexion)
	{
		die();
	}

	$sqlFotos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tbl_fotos LIMIT $inicio, $fotos_pagina");

	$sqlFotos->execute();
	$fotos = $sqlFotos->fetchAll();

	if(!$fotos)
	{
		header('Location: index.php');
	}

	$sql = $conexion->prepare("SELECT FOUND_ROWS() AS total_filas");
	$sql->execute();
	$total_post = $sql->fetch()['total_filas'];

	$total_paginas = ceil($total_post / $fotos_pagina);


	require "views/index.view.php"
 ?>