<?php
include("conexion.php");

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    if($conexion->query($sql)){
        echo "ok";
    }else{
        echo "error: " . $conexion->error;
    }
}else{
    echo "no_id";
}
?>