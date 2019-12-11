
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/stilos.css">
	<title>Galeria</title>
</head>
<body>
	<header>
		<img src="img/Logo.png" class="imagen-encabezado">
		<div class="contenedor">
			<h1 class="titulo">Subir foto</h1>
		</div>
	</header>



	<div class="contenedor">
		<form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">


			<label for="foto">Selecciona tu foto</label>
			<input type="file" id="foto" name="foto" >

			<div id="imagen_pequena">

        	</div>
        	<script src="js/mostrarFotosMiniatura.js"></script>

			   <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Categorias</span>


                            <select name="categoria" class="form-control" >
                               <?php 
                               		$sqlCategoria = $conexion->prepare("SELECT id,nombre FROM tbl_categoria");

									$sqlCategoria->execute();
									$categorias = $sqlCategoria->fetchAll();	

									foreach($categorias as $categoria)
									{
										?>
										<option value="<?php print($categoria['id']); ?>">
											<?php print($categoria['nombre']); ?>
										</option>

										<?php
									}
                               ?>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
                        <input class="form-control" id="titulo" name="titulo" placeholder="Ingrese nombre de la foto">
                    </div>
                </div>

			<span class="input-group-addon">Descripcion de la foto</span>
			<textarea name="texto" id="texto" placeholder="Ingrese una descripcion"></textarea>

			<?php if(isset($error)): ?>
				<p class="error"> <?php echo $error;?> </p>
			<?php endif ?>

			<input type="submit" class="btn btn-primary" value="Subir Foto">
			
		</form>

		<div class="foto">
			<input type="submit" class="btn btn-primary" value="Pagina Principal" onclick = "location='index.php'"/> 
		</div>
	</div>

	<footer>
		<p class="copyright">in Photo</p>
	</footer>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>