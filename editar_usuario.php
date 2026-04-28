<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM usuario WHERE id_usuario=$id";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();
?>

<form action="actualizar_usuario.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $fila['id_usuario']; ?>">

    <input name="usuario" value="<?php echo $fila['usuario']; ?>">
    <input name="contraseña" value="<?php echo $fila['contraseña']; ?>">

    <select name="rol">
        <option value="admin">Admin</option>
        <option value="almacen">Almacen</option>
        <option value="administrativo">Administrativo</option>
        <option value="tecnico">Tecnico</option>
    </select>

    <button type="submit">Actualizar</button>
</form>