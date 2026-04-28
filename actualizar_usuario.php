<?php
include("conexion.php");

if(isset($_POST['id'])){

    $id = intval($_POST['id']);
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena']; // puedes cambiar luego
    $rol = $_POST['rol'];

    $sql = "UPDATE usuario 
            SET usuario='$usuario', contrasena='$contrasena', rol='$rol'
            WHERE id_usuario=$id";

    if($conexion->query($sql)){
        header("Location: /INTERFACES/vistas/Admin.php?mensaje=edit");
        exit();
    }else{
        echo "Error: " . $conexion->error;
    }

}else{
    echo "No se recibieron datos";
}
?>