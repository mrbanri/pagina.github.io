<?php
// Configuración de la conexión
$host = "localhost";
$user = "root";
$pass = "";
$database = "dbformulario";

// Conexión a MySQL
$connection = mysqli_connect($host, $user, $pass, $database);

// Verificar conexión
if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $usuario = mysqli_real_escape_string($connection, $_POST["usuario"]);
    $contraseña = mysqli_real_escape_string($connection, $_POST["contraseña"]);

    // Insertar datos
    $query = "INSERT INTO tabla_form (nombre, usuario, contraseña) VALUES ('$nombre', '$usuario', '$contraseña')";
    
    if (mysqli_query($connection, $query)) {
        // Redireccionar después de registrar
        header("Location: pagina.html");
        exit();
    } else {
        echo "<script>alert('Error al registrar: " . mysqli_error($connection) . "'); window.location.href='index.html';</script>";
    }
}

mysqli_close($connection);
?>