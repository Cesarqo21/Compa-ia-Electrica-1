<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO proveedor (nombre, telefono, direccion)
        VALUES ('$nombre','$telefono','$direccion')";

$conexion->query($sql);

header("Location: ../vistas/GestionProveedores.php");
?>