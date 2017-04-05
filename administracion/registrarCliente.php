<?php
    require_once ('../baseDatos/class.conexion.php');
    require_once ('../baseDatos/class.consultas.php');
    
    $mensaje = null;
    $nombreCompleto= $_POST['campoNombreCompleto'];
    $usuario = $_POST['campoUsuario'];
    $contrasena =$_POST['campoContrasena'];
    $correo = $_POST['campoCorreo'];
    $fechaNacimiento = $_POST['campoFechaNacimiento'];
    $sexo = $_POST['campoSexo'];

    if (strlen($nombreCompleto) > 0 && strlen($usuario) >0 && strlen($contrasena) >0 && strlen($correo)>0 && strlen($fechaNacimiento)  > 0){
        $consultas = new Consultas();
        $mensaje = $consultas->insertarCliente($nombreCompleto, $usuario,$contrasena,$correo, $fechaNacimiento,$sexo);    
        echo("<a href='registrarCliente.html'> Nuevo Cliente </a>");
    } else {
        echo "Por favor completa todos los campos";
    }

    echo $mensaje;

?>
