<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->getConexion();

// Obtener el nombre de usuario de la URL
$usuario = $_GET['usuario'] ?? '';

// Consultar la información del usuario en la base de datos
$sql = $con->prepare("SELECT * FROM informacion WHERE usuario = :usuario");
$sql->bindParam(':usuario', $usuario);
$sql->execute();
$info = $sql->fetch(PDO::FETCH_OBJ);

if (!$info) {
    // Si no se encuentra la información, redirigir a una página de error o mostrar un mensaje
    echo "<div class='alerta'>No se encontró la información del usuario.</div>";
    exit();
}
?>
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
        <nav>
            <ul>
                <li><a href="#home" class="cambia">Inicio</a></li>
                <li ><a href="#sobre-mi" class="cambia">Sobre mi</a></li>
                <li><a href="#contacto" class="cambia">Contacto</a></li>
                <li><a href="index.html" id="error" class="cambia">Error</a></li>
                <li><a href="login.php" class="cambia">Salir</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <div class="row container-fluid">
                <div class="col-4 p-5">
                    <img src="images/inicio03.png" alt="Sobre mi"  style="height: 300px;">
                </div>
                <div class="col-8 mt-5 p-5">  
                    <h2>Bienvenidos a mi Página Web</h2>
                    <p id="texto"><?php echo htmlspecialchars($info->presentacion); ?></p>
                </div>
            </div>
            <div class="linea"></div>
        </section>
        <section id="sobre-mi" class="text-center">
            <h2>Sobre mi</h2>
            <div class="row  p-5">
                <div class="col-4">
                    <h3>Experiencia</h3>
                    <p><?php echo htmlspecialchars($info->experiencia); ?></p>
                </div>
                <div class="col-4">
                    <h3>Hobbies</h3>
                    <p><?php echo htmlspecialchars($info->hobbies); ?></p>
                </div>
                <div class="col-4">
                    <h3>Estudios</h3>
                    <p><?php echo htmlspecialchars($info->estudios); ?></p>
                </div>
            </div>
            <div class="linea"></div>
        </section>
        <section id="contacto" >
            <h2 class="text-center">Contacto</h2>
            <div class='contacto_usuario'>
                <div>
                    <h4>Email</h4>
                    <p><?php echo htmlspecialchars($info->email); ?></p>
                </div>
                <div>
                    <h4>Telefono</h4>
                    <p><?php echo htmlspecialchars($info->telefono); ?></p>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center">
        <div class="pt-1 ">
            <p><?php echo htmlspecialchars($info->usuario); ?> - 2024</p>
        </div>
    </footer>
    
    <script src="scripts.js"></script>
</body>
</html>