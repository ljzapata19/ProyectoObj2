
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>
    <header>
        <div class="logo"><a href="login.php" class="cambia">Segundo Objetivo</a></div>
        
    </header>
    <div class="inicio_sesion">
        <div class="formulario">
            <h1>Registrarse</h1>
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
                $conexion = new Conexion();

                $con = $conexion->getConexion();

                if (!empty($_POST['ingresa'])) {
                    if (empty($_POST['usuario']) || empty($_POST['password'])) {
                        echo "<div class='alerta'>Los campos están vacíos.</div>";
                    } else {
                        $usuario = $_POST['usuario'];
                        $clave = $_POST['password'];
                        // verifica si el usuario ya existe en la base de datos
                        $sql = $con->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
                        $sql->bindParam(':usuario', $usuario);
                        // ejecuta la consulta
                        $sql->execute();
                        // resultados como obj
                        $datos = $sql->fetch(PDO::FETCH_OBJ);

                        if ($datos) {
                            echo "<div class='alerta'>El usuario ya está registrado.</div>";
                        } else {
                            // inserta el usuario nuevo
                            $sql = $con->prepare("INSERT INTO usuarios (usuario, clave) VALUES (:usuario, :clave)");
                            $sql->bindParam(':usuario', $usuario);
                            $sql->bindParam(':clave', $clave);

                            if ($sql->execute()) {
                                header("Location: registo_info.php?usuario=" . urlencode($usuario));
                                exit();
                            } else {
                                echo "<div class='alerta'>Error al registrar el usuario.</div>";
                            }
                        }
                    }
                }
                ?>
                <input type="submit" name="ingresa" value="Registrarse">
                <div class="registrarse">
                    Si ya tiene cuenta, <a href="login.php">inicie sesión.</a>
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