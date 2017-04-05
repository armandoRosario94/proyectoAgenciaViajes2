<?php
  class BaseDatos {
    private $conexion;

    public function realizarConexion() {
      $user = "root";
      $pass = "";
      $host = "localhost";
      $bd = "bdagenciaviajes";
      $dsn = "mysql:dbname=$bd;host=$host";
      
      try {
        //$this->$conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);  
        $this->conexion = new PDO($dsn, $user, $pass);  
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo '¡se conectó correctamente!';
        echo"<script>alert('¡se conectó correctamente!')</script>";
      } catch (Exception $e) {
        echo 'Falló la conexión: '.$e->getMessage();
      }      
      //return $conexion;      
    }

    public function cerrarConexion() {
      $this->conexion = null;
    }

    public function insertarCliente($varlocalNombreCompleto, $varlocalUsuario, $varlocalContrasena, $varlocalCorreo, $varlocalFechaNacimiento, $varlocalSexo) {          
      //$modelo = new Conexion();
      //$conexion = $modelo->get_conexion();
      
      $sql = "insert into cliente (nombreCompleto, usuario, contrasena, correo, fechaNacimiento, sexo) values (:nombreCompleto, :usuario, :contrasena, :correo, :fechaNacimiento, :sexo)";      
      $statement = $this->conexion->prepare($sql);
      $statement->bindParam(':nombreCompleto', $varlocalNombreCompleto);
      $statement->bindParam(':usuario', $varlocalUsuario);
      $statement->bindParam(':contrasena', $varlocalContrasena);
      $statement->bindParam(':correo', $varlocalCorreo);
      $statement->bindParam(':fechaNacimiento', $varlocalFechaNacimiento);
      $statement->bindParam(':sexo', $varlocalSexo);
      if (!$statement) {
        return "Error al crear el registro";
      } else{
        $statement->execute();
        return "Registro creado correctamente";
      }
    }

    public function consultarUsuario($consulta) {
      $rows = null;
      //$modelo = new Conexion();
      //$conexion = $modelo->get_conexion();
      //$sql = $consulta;
      $statement = $this->conexion->prepare($consulta);
      $statement->execute();
      $resultado = $statement->fetch();

      //while ($result = $statement->fetch()) {
        //$rows[] = $result;
      //}
      //return $rows;
      return $resultado;
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
