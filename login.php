<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Inicio de sesión</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e3a8a);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    color:white;
}

.login{
    background:#111827;
    padding:30px;
    border-radius:12px;
    width:300px;
    text-align:center;
}

input{
    width:90%;
    padding:10px;
    margin:10px;
    border:none;
    border-radius:6px;
}

button{
    width:100%;
    padding:10px;
    background:#3b82f6;
    border:none;
    color:white;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#2563eb;
}
</style>
</head>
<body>

<div class="login">
<form action="../controlador/login.php" method="POST">  
<h2>Iniciar sesión</h2>
<input type="text" name="usuario" placeholder="Usuario" required>
<input type="password" name="contrasena" placeholder="Contrasena" required>
<button type="submit">Entrar</button>
</form>

</div>
</body>
</html>