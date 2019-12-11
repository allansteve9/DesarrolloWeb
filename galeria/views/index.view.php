<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/stilos.css">
	<title>Galeria</title>
</head>
<body>
	<header>
		<img src="img/Logo.png" class="imagen-encabezado">
		<div class="contenedor">
			<h1 class="titulo">in Photo</h1>
			<a href="subir.php" class="subirfoto">Subir Foto</a>

		</div>
		
	</header>

	<section class="fotos">
		<div class="contenedor">

			<?php foreach($fotos as $foto): ?>
				<div class="thumb">
					<a href="foto.php?id=<?php echo $foto['PK_idFoto']; ?>">
						<img src="img/<?php echo $foto['ruta_foto']?>">
					</a>
				</div>
			<?php endforeach;?>

			<div class="paginacion">
				
				<?php if ($pagina_actual > 1): ?>
					<a href="index.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"> ←</a>
				<?php endif?>

				<?php if ($total_paginas != $pagina_actual): ?>
					<a href="index.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha"> → </a>

				<?php endif ?>

				
			</div>

		</div>
	</section>

	<footer>
		<p class="copyright">in Photo</p>
	</footer>



</body>
</html>