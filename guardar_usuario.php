<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$rol = $_POST['rol'];

$sql = "INSERT INTO usuario (usuario, contrasena, rol) 
        VALUES ('$usuario','$contrasena','$rol')";

if($conexion->query($sql)){
    header("Location: /INTERFACES/vistas/Admin.php?mensaje=ok");
    exit();
}else{
    echo "Error: " . $conexion->error;
}
?>