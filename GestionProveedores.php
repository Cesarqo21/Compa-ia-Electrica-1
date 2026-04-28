<?php
session_start();
include("../controlador/conexion.php");

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != "administrativo"){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Proveedores</title>

<style>
body{margin:0;font-family:Segoe UI;background:#0f172a;color:white}

.sidebar{
width:200px;
height:100vh;
background:#111827;
position:fixed;
padding:20px;
}

.sidebar a{
display:block;
color:white;
padding:10px;
text-decoration:none;
cursor:pointer;
}

.main{
margin-left:220px;
padding:20px;
}

.card{
background:#1e293b;
padding:20px;
border-radius:10px;
margin-bottom:20px;
}

input{
padding:8px;
margin:5px;
border:none;
border-radius:6px;
}

button{
padding:8px 12px;
border:none;
border-radius:6px;
margin:3px;
cursor:pointer;
}

.agregar{background:#3b82f6;color:white}
.editar{background:#f59e0b;color:white}
.eliminar{background:#ef4444;color:white}

table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:10px;
border-bottom:1px solid #334155;
}
</style>
</head>

<body>

<div class="sidebar">
<h2>Sistema</h2>
<a href="#">Proveedores</a>
<a href="../controlador/logout.php">Cerrar sesión</a>
</div>

<div class="main">

<h1>Gestión de proveedores</h1>

<!-- AGREGAR -->
<div class="card">
<form action="../controlador/guardar_proveedor.php" method="POST">
<input name="nombre" placeholder="Nombre" required>
<input name="telefono" placeholder="Teléfono" required>
<input name="direccion" placeholder="Dirección" required>

<button class="agregar" type="submit">Agregar</button>
</form>
</div>

<!-- TABLA -->
<div class="card">

<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Teléfono</th>
<th>Dirección</th>
<th>Acciones</th>
</tr>

<?php
$sql = "SELECT * FROM proveedor";
$res = $conexion->query($sql);

while($f = $res->fetch_assoc()){
?>
<tr>
<td><?= $f['id_proveedor'] ?></td>
<td><?= $f['nombre'] ?></td>
<td><?= $f['telefono'] ?></td>
<td><?= $f['direccion'] ?></td>
<td>

<button class="editar"
onclick="editarProveedor(
<?= $f['id_proveedor'] ?>,
'<?= $f['nombre'] ?>',
'<?= $f['telefono'] ?>',
'<?= $f['direccion'] ?>'
)">
Editar</button>

<a href="../controlador/eliminar_proveedor.php?id=<?= $f['id_proveedor'] ?>">
<button class="eliminar">Eliminar</button>
</a>

</td>
</tr>
<?php } ?>

</table>
</div>

<!-- FORM EDITAR -->
<div class="card" id="formEditar" style="display:none;">
<h3>Editar proveedor</h3>

<form action="../controlador/actualizar_proveedor.php" method="POST">
<input type="hidden" name="id" id="edit_id">

<input name="nombre" id="edit_nombre" required>
<input name="telefono" id="edit_telefono" required>
<input name="direccion" id="edit_direccion" required>

<button class="editar" type="submit">Actualizar</button>
<button type="button" onclick="cerrar()">Cancelar</button>
</form>
</div>

</div>

<script>
function editarProveedor(id,nombre,telefono,direccion){

document.getElementById("formEditar").style.display="block";

document.getElementById("edit_id").value=id;
document.getElementById("edit_nombre").value=nombre;
document.getElementById("edit_telefono").value=telefono;
document.getElementById("edit_direccion").value=direccion;
}

function cerrar(){
document.getElementById("formEditar").style.display="none";
}
</script>

</body>
</html>