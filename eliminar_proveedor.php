<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM proveedor WHERE id_proveedor = $id";
$conexion->query($sql);

header("Location: ../vistas/GestionProveedores.php");
?>