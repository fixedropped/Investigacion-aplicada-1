<?php 
    session_start();

    if(!isset($_SESSION['usuario'])){
        header("Location: index.php");
        exit;
    }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Confirmacion</title>
 </head>
 <body>
    <div class="container mt-4">
        <div class="alert alert-info mt-3">
            <h1>Login conseguido</h1>
            <h4>Bienvenido, <?= $_SESSION['usuario'] ?></h4>
            <p>Servidor: <?= gethostname() ?></p>
        </div>
            <h2>Opciones</h2>
            <ul>
                <li>Perfil</li>
                <li>Configuración</li>
                <li>Reportes</li>
            </ul>
            <button type="submit">Cerrar sesion</button>
    </div>
 </body>
 </html>