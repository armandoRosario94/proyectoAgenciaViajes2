<?php
    //require_once ('../baseDatos/class.conexion.php');
    //require_once ('../baseDatos/class.consultas.php');
    require ("baseDatos/baseDatos.php");

    $tipoUsuario = $_POST['selectTipoUsuario'];
    $usuario = $_POST['campoUsuario'];
    $contrasena = $_POST['campoContrasena'];   

    if ($tipoUsuario == "administrador") {
        //alert "el usuario es de tipo administrador";
        echo"<script>alert('el usuario es de tipo administrador')</script>";
        consultarDatosAministrador($tipoUsuario,$usuario,$contrasena);
        //header('location:administracion/index.php');
    } else if ($tipoUsuario == "cliente"){
        //echo "el usuario es de tipo cliente";
        echo"<script>alert('el usuario es de tipo cliente')</script>";
        //header('location:index.html');
        header('location:administracion/index.php');
    } else {
        echo"<script>alert('el usuario es de tipo desconocido')</script>";
        //echo "el usuario es de tipo desconocido";
    }


    function consultarDatosAministrador($varLocalTipoUsuario,$varLocalUsuario,$varLocalContrasena) {
        $resultadoFila = null;        

        $query = "SELECT usuario,contrasena FROM administrador where usuario ='$varLocalUsuario' and contrasena = '$varLocalContrasena'";
        //$query = "SELECT * from administrador";        
        $objetoBd = new BaseDatos();
        $objetoBd->realizarConexion();

        $resultados = $objetoBd->consultarUsuario($query);
    
        if ($resultados !== false) {
            echo"<script>alert('el usuario Administrador: ". $varLocalUsuario." si se encuentra registrado')</script>";
            header('location:administracion/index.php');
        } else {
            echo"<script>alert('el usuario Administrador: ". $varLocalUsuario." no se encuentra registrado')</script>";            
            //header('location:index.html');
            echo "<a href='index.html'>Salir</a>";
        }

        $objetoBd->cerrarConexion();
    }
        /*
    echo "<div class='panel_superior'>";
        if($usuario=='heydi' && $contrasenia=='admin') {
            echo "Bienvenido Lic. Heydi";
            echo "<a href='index.html'>Salir</a>";
        } else {
            echo "Usuario incorrecto";
            header('location:index.html');
        }
        echo "</div>";
    */                
?>


