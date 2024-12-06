<?php
require_once('conexion.php');

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

// Obtener la conexión PDO
$con = $conexion->getConexion();

if(!empty($_POST['ingresa'])){
    if (empty($_POST['usuario']) and empty($_POST['password'])) {
        echo "<div class='alerta'>Los campos están vacíos.</div>";
    } else {
        $usuario = $_POST['usuario'];
        $clave = $_POST['password'];

        $sql = $con->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave");
        $sql->bindParam(':usuario', $usuario);
        $sql->bindParam(':clave', $clave);

        // Ejecutar la consulta
        $sql->execute();

        // Obtener los resultados como un objeto
        $datos = $sql->fetch(PDO::FETCH_OBJ);

        if ($datos) {
            header("Location: inicio.php?usuario=" . urlencode($usuario));
        } else {
            echo "<div class='alerta'>Acceso denegado.</div>";
        }
        
    }
    
}

?>