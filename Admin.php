
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
include("../controlador/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Administrador</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e3a8a);
    color:white;
}

.container{
    width:80%;
    margin:auto;
    padding:20px;
}

.card{
    background:#111827;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}

input,select{
    padding:10px;
    margin:5px;
    border-radius:6px;
    border:none;
}

button{
    padding:8px;
    background:#3b82f6;
    border:none;
    color:white;
    border-radius:6px;
    cursor:pointer;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

th,td{
    padding:10px;
    border-bottom:1px solid #444;
    text-align:center;
}

.alerta{
    padding:12px;
    border-radius:6px;
    text-align:center;
    margin-bottom:15px;
    font-weight:bold;
}
.ok{ background:#22c55e; }
.edit{ background:#eab308; }
.delete{ background:#ef4444; }
</style>
</head>

<body>

<div class="container">

<h2>Panel de Administrador</h2>

<!-- MENSAJES -->
<?php if(isset($_GET['mensaje'])){ ?>
<div id="alerta" class="alerta 
<?php 
if($_GET['mensaje']=="ok") echo "ok";
elseif($_GET['mensaje']=="edit") echo "edit";
?>">
<?php
if($_GET['mensaje']=="ok") echo "Usuario registrado";
elseif($_GET['mensaje']=="edit") echo "Usuario actualizado";
?>
</div>
<?php } ?>

<!-- LOGOUT -->
<form action="../controlador/logout.php" method="POST">
<button type="submit">Cerrar sesión</button>
</form>

<!-- REGISTRAR -->
<div class="card">
<h3>Registrar usuario</h3>

<form action="../controlador/guardar_usuario.php" method="POST">
<input type="text" name="usuario" placeholder="Usuario" required>
<input type="password" name="contrasena" placeholder="Contraseña" required>

<select name="rol">
<option value="almacen">Almacen</option>
<option value="administrativo">Administrativo</option>
<option value="tecnico">Tecnico</option>
</select>

<button type="submit">Guardar</button>
</form>
</div>

<!-- TABLA -->
<div class="card">
<h3>Usuarios registrados</h3>

<table>
<tr>
<th>ID</th>
<th>Usuario</th>
<th>Rol</th>
<th>Acciones</th>
</tr>

<?php
$sql = "SELECT * FROM usuario";
$res = $conexion->query($sql);

while($f = $res->fetch_assoc()){
?>
<tr id="fila_<?= $f['id_usuario'] ?>">
<td><?= $f['id_usuario'] ?></td>
<td><?= $f['usuario'] ?></td>
<td><?= $f['rol'] ?></td>
<td>

<button 
onclick="editarUsuario(this)"
data-id="<?= $f['id_usuario'] ?>"
data-usuario="<?= htmlspecialchars($f['usuario'], ENT_QUOTES) ?>"
data-rol="<?= $f['rol'] ?>"
>
Editar
</button>

<button onclick="eliminarUsuario(<?= $f['id_usuario'] ?>)">Eliminar</button>

</td>
</tr>
<?php } ?>
</table>
</div>

<!-- EDITAR -->
<div class="card" id="formEditar" style="display:none;">
<h3>Editar usuario</h3>

<form action="../controlador/actualizar_usuario.php" method="POST">
<input type="hidden" name="id" id="edit_id">

<input type="text" name="usuario" id="edit_usuario" required>
<input type="password" name="contrasena" id="edit_contraseña" required>

<select name="rol" id="edit_rol">
<option value="admin">Admin</option>
<option value="almacen">Almacen</option>
<option value="administrativo">Administrativo</option>
<option value="tecnico">Tecnico</option>
</select>

<button type="submit">Actualizar</button>
<button type="button" onclick="cerrarFormulario()">Cancelar</button>
</form>
</div>

</div>

<script>
function editarUsuario(btn){
    let id = btn.dataset.id;
    let usuario = btn.dataset.usuario;
    let rol = btn.dataset.rol;

    document.getElementById("formEditar").style.display = "block";

    document.getElementById("edit_id").value = id;
    document.getElementById("edit_usuario").value = usuario;
    document.getElementById("edit_contrasena").value = ""; 
    document.getElementById("edit_rol").value = rol;
}

function cerrarFormulario(){
    document.getElementById("formEditar").style.display="none";
}

function eliminarUsuario(id){
    if(confirm("¿Eliminar usuario?")){
        fetch("../controlador/eliminar_usuario.php?id="+id)
        .then(r=>r.text())
        .then(d=>{
            if(d.trim()=="ok"){
                mostrarMensaje("Eliminado","delete");
                document.getElementById("fila_"+id).remove();
            }else{
                alert(d);
            }
        });
    }
}

function mostrarMensaje(txt,tipo){
    let d=document.createElement("div");
    d.className="alerta "+tipo;
    d.innerText=txt;
    document.querySelector(".container").prepend(d);
    setTimeout(()=>d.remove(),3000);
}
</script>

</body>
</html>
```
