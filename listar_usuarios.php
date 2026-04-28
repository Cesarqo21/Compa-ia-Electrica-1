<?php
include("conexion.php");

$sql = "SELECT * FROM usuario";
$resultado = $conexion->query($sql);

echo "<h2>Lista de usuarios</h2>";

while($fila = $resultado->fetch_assoc()){
    echo $fila['usuario'] . " - " . $fila['rol'];

    echo " <a href='eliminar_usuario.php?id=".$fila['id_usuario']."'>Eliminar</a>";
    echo "<br>";
}
?>