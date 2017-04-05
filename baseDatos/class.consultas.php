<?php

  class Consultas {

    public function insertarCliente($varlocalNombreCompleto, $varlocalUsuario, $varlocalContrasena, $varlocalCorreo, $varlocalFechaNacimiento, $varlocalSexo) {          
      $modelo = new Conexion();
      $conexion = $modelo->get_conexion();
      
      $sql = "insert into cliente (nombreCompleto, usuario, contrasena, correo, fechaNacimiento, sexo) values (:nombreCompleto, :usuario, :contrasena, :correo, :fechaNacimiento, :sexo)";      
      $statement = $conexion->prepare($sql);
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

    public function consultaCliente($consulta) {
      $rows = null;
      $modelo = new Conexion();
      $conexion = $modelo->get_conexion();
      //$sql = $consulta;
      $statement = $conexion->prepare($consulta);
      $statement->execute();
      while ($result = $statement->fetch()) {
        $rows[] = "$result";        
      }
      return $rows;
    }
  }
?>
