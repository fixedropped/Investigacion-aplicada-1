<?php
session_start();
//Iniciando sesión
// Array de usuarios simulados para hacer login
$usuarios = [
    "usuario1@gmail.com" => "12345",
    "usuario2@gmail.com" => "54321"
];

//Variable vacia para determinar error
$error = "";

//Validando si el formulario usa el metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Recibiendo las variables email y password
    //Validando email usando la funcion filter_var y el filtro de email para la variable obtenida por post llamada 'email'
    $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    //Contraseña obtenida por el metodo POST
    $password = $_POST['contraseña'];

    //Verificando que $email pertenece al array de usuarios y que la contraseña introducida es la relacionada con el usuario.
    if (isset($usuarios[$email]) && $usuarios[$email] === $password) {
        // Guardamos sesión
        $_SESSION['usuario'] = $email;
        // Guardamos la cookie por 1 día
        setcookie("usuario", $email, time() + 86400, "/");
        header("Location: validacion.php");
        exit;
    } else {
        //Mensaje default en caso de error
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login investigacion</title>
    <!--Enlace de Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!--Contenedor para Bootstrap-->
    <div class="container mt-5">
        <!--Div para centrar formulario-->
        <div class="row justify-content-center">
            <!--Div para almacenar los input de email y password-->
            <div class="col-md-4 bg-white p-4 rounded shadow">
                <h3 class="mb-3 text-center">Iniciar Sesión</h3>
                <!--Validación en caso de que exista un error en los datos-->
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <!--Form para Login-->
                <form method="post" id="loginForm">
                    <!--div de email-->
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>
                    <!--div de password-->
                    <div class="mb-3">
                        <label>Contraseña:</label>
                        <input type="password" name="contraseña" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>