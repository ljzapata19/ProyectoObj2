
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <header>
        <div class="logo"><a href="login.php" class="cambia">Segundo Objetivo</a></div>
        
    </header>
    <div class="inicio_sesion">
        <div class="formulario">
            <h1>Iniciar Sesión</h1>
            <form method="post">
                <div class="username">
                    <input type="text" name="usuario" >
                    <label>Usuario</label>
                </div>
                <div class="username">
                    <input type="password" name="password" >
                    <label >Contraseña</label>
                </div>  
                <?php
                require_once('conexion.php');
                require_once('controlador.php');
                ?>
                <input type="submit" name="ingresa" value="Iniciar">
                <div class="registrarse">
                    Si no tiene cuenta, <a href="registro.php">registrarse</a>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center">
        <div class="pt-1 ">
            <p>Lourdes Zapata - 2024</p>
        </div>
    </footer>
    
    <script src="scripts.js"></script>
</body>
</html>