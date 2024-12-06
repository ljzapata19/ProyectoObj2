<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Información</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="logo"><a href="login.php" class="cambia">Segundo Objetivo</a></div>
    </header>
    <section class='completar_informacion'>
        <div class='formulario_ci'>
            <h1>Completar Información</h1>
            <form method="post">
                <input type="hidden" name="usuario" value="<?php echo htmlspecialchars($_GET['usuario']); ?>">
                <div class=" username ci">
                    <textarea name="presentacion" maxlength="800"></textarea>
                    <label class='label_ta'>Presentación</label>
                    
                </div>
                <div class="username ci">
                    <textarea name="experiencia" maxlength="300" ></textarea>
                    <label class='label_ta'>Experiencia</label>
                    
                </div>
                <div class="username ci">
                    <textarea name="hobbies" maxlength="300"></textarea>
                    <label class='label_ta'>Hobbies</label>
                    
                </div>
                <div class="username ci">
                    <textarea name="estudios" maxlength="300"></textarea>
                    <label class='label_ta'>Estudios</label>
                    
                </div>
                <div class="username ci">
                    <input type="email" name="email">
                    <label>Email</label>
                    
                </div>
                <div class="username ci">
                    <input type="tel" name="telefono">
                    <label>Teléfono</label>
                    
                </div>
                <input type="submit" name="completar" value="Guardar">
            </form>
        </div>
    </section>
        
    

    <footer class="text-center">
        <div class="pt-1">
            <p>Lourdes Zapata - 2024</p>
        </div>
    </footer>
</body>
</html>

<?php
require_once('conexion.php');
$conexion = new Conexion();

$con = $conexion->getConexion();

if (!empty($_POST['completar'])) {
    $usuario = $_POST['usuario'];
    $presentacion = $_POST['presentacion'];
    $experiencia = $_POST['experiencia'];
    $hobbies = $_POST['hobbies'];
    $estudios = $_POST['estudios'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Insertar los datos adicionales en la tabla informacion
    $sql = $con->prepare("INSERT INTO informacion (usuario, presentacion, experiencia, hobbies, estudios, email, telefono) 
                          VALUES (:usuario, :presentacion, :experiencia, :hobbies, :estudios, :email, :telefono)");
    $sql->bindParam(':usuario', $usuario);
    $sql->bindParam(':presentacion', $presentacion);
    $sql->bindParam(':experiencia', $experiencia);
    $sql->bindParam(':hobbies', $hobbies);
    $sql->bindParam(':estudios', $estudios);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':telefono', $telefono);

    if ($sql->execute()) {
        header("Location: inicio.php?usuario=" . urlencode($usuario));
        exit();
    } else {
        echo "<div class='alerta'>Error al guardar la información.</div>";
    }
}
?>
