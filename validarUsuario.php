<?php
    require "/php/BaseDatos.php";

    $tipoUsuario = $_POST['selectTipoUsuario'];
    $usuario = $_POST['v_user'];
    $contrasena = $_POST['v_password'];   

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

    function consultarDatosAministrador($varLocalTipoUsuario,$varLocalUsuario,$varLocalContrasena) {
        //$query = "SELECT usuario, contrasena FROM administrador where usuario= '"+$usuario"' and contrasena ='"+$contrasena "'";        
        echo"<script>alert('el usuario es de tipo: ". $varLocalTipoUsuario."')</script>";
        echo"<script>alert('usuario: ".$varLocalUsuario."')</script>";
        echo"<script>alert('constrasena: ".$varLocalContrasena."')</script>";
        
        

        $query = "SELECT usuario,contrasena FROM administrador where usuario = $varLocalUsuario  and contrasena =$varLocalContrasena";
        $bd = new BaseDatos();
        $bd->realizarConexion();
        $resultado = $bd->realizarConsulta($query);
        //$bd->realizarConsulta($query);

        /* determinar el número de filas del resultado */
        $numeroFilas = $resultado->num_rows;
        //$numeroFilas = mysqli_num_rows($resultado);
        printf("Número de filas resultantes: %d rows.\n",$numeroFilas);

        //$numeroFilas = mysqli_num_rows($resultado);
        //printf("Número de filas resultantes: %d rows.\n",$numeroFilas);
        mysqli_free_result($resultado); //Libera la memoria asociada a un resultado

        //cerrar el resultset */
        //$resultado->close();
        $bd->cerrarConexion();
    }
?>
