<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$sql = "UPDATE proveedor 
        SET nombre='$nombre', telefono='$telefono', direccion='$direccion'
        WHERE id_proveedor=$id";

$conexion->query($sql);

header("Location: ../vistas/GestionProveedores.php");
?>