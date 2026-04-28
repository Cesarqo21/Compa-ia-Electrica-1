<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuario 
        WHERE usuario='$usuario' AND contrasena='$contrasena'";

$res = $conexion->query($sql);

if($res->num_rows > 0){

    $fila = $res->fetch_assoc();

    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['rol'] = $fila['rol'];

    //REDIRECCIÓN POR ROL
    if($fila['rol'] == "admin"){
        header("Location: /INTERFACES/vistas/Admin.php");
    }
    elseif($fila['rol'] == "tecnico"){
        header("Location: /INTERFACES/vistas/Tecnico.php");
    }
    elseif($fila['rol'] == "almacen"){
        header("Location: /INTERFACES/vistas/GestionInstalacion.php");
    }
    elseif($fila['rol'] == "administrativo"){
        header("Location: /INTERFACES/vistas/GestionProveedores.php");
    }

    exit();

}else{
    echo "Usuario o contraseña incorrectos";
}
?>