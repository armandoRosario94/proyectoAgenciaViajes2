<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel Administrativo</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Práctica 2 - TIII" />
    <meta name="keywords" content="HTML5, CSS3, GIT, GITHUB, PHP, MARIADB " />
    <meta name="author" content="ConociendoOaxaca" />
    <link rel="stylesheet" href="css/style-panel-admin.css" type="text/css" />
    
     <!-- INICIAN ETIQUETAS NUEVAS -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="index, follow" />
    <!-- TERMINAN ETIQUETAS NUEVAS -->
</head>
<body>
<?php
$usuario = $_POST['v_user'];
$contrasenia = $_POST['v_password'];

echo "<div class='panel_superior'>";
if($usuario=='heydi' && $contrasenia=='admin')
{
    echo "Bienvenido Lic. Heydi";
    echo "<a href='index.html'>Salir</a>";
}
else{
    echo "Usuario incorrecto";
    header('location:index.html');
}
echo "</div>";
?>
</body>
</html>
