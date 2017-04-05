<?php
  class Conexion {
    public function get_conexion() {
      $user = "root";
      $pass = "";
      $host = "localhost";
      $db = "bdagenciaviajes";
      $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);  
      return $conexion;

    }
  }











/*
  class BaseDatos {
    private $conexion;

    //Abrir una conexión
    public function realizarConexion() {
      $this->conexion = new mysqli("localhost","root","","bdagenciaviajes");
      if ($this->conexion->connect_errno) { //falló al conectarse
        echo "No hay conexión con los datos, consulte con el administrador.";
        exit();
      } else {
        echo "la conexion se realizó correctamente.";
      }
    }


    public function realizarConsulta($consulta) {
      
      if ($resultado = mysqli_query($this->conexion,$consulta)) {        
$resul_co =mysql_query($sql_co);
        //$numeroFilas = mysqli_num_rows($resultado);
        //printf("Número de filas resultantes: %d rows.\n",$numeroFilas);
        
        //mysqli_free_result($resultado); //Libera la memoria asociada a un resultado

        return $resultado;
      }
      //mysqli_close($this->conexion);
    }


    public function cerrarConexion() {
      $this->conexion->close();
    }

  }
  */
?>
