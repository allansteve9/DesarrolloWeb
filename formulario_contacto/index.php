<?php
    
    $errores = "";
    $enviado = "";

    if(isset($_POST['submit']))
    {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];

        if(!empty($nombre)){
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }
        else {
            $errores .= "Ingrese un nombre" . "<br>";
        }

        if(!empty($nombre)){
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
            
            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $errores .= "Ingrese un correo valido". "<br>";
            }
            
        }

        else {
            $errores .= "Ingrese un correo" . "<br>";
        }

        if(!empty($mensaje))
        {
            $mensaje = htmlspecialchars($mensaje);
            $mensaje = trim($mensaje);
            $mensaje = stripslashes($mensaje);

        }
        else {
            $errores .= "Ingrese un mensaje" . "<br>";
        }

        if(!$errores)
        {
            $enviar_a = 'se.allanletona@gmail.com';
            $asunto = 'Correo Enviado desde curso de php';
            $mensaje_preparado = "De: ".$nombre."\n";
            $mensaje_preparado .= "Correo: ".$correo."\n";
            $mensaje_preparado .= "Mensaje ".$mensaje;

            //mail($enviar_a, $asunto, $mensaje_preparado);
            $enviado = true;

        }
    }
require 'index.view.php';
?>