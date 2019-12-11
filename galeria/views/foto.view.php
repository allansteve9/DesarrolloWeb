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
			<h1 class="titulo">
				<?php if (!empty($foto['nombre_foto']))
					{
						echo $foto['nombre_foto'];
					}
					else{
						echo $foto['ruta_foto'];
					}

				?>
				
			</h1>
		</div>
	</header>

	<div class="contenedor">
		<div class="foto">
			<img src="img/<?php echo $foto['ruta_foto']; ?>">
			<p class="texto"> <?php echo $foto['descripcion_foto']; ?> </p>
			<a href="index.php" class="regresar">←</a>
		</div>
	</div>

	<footer>
		<p class="copyright">in Photo</p>
	</footer>



</body>
</html>