
<?php
include_once "conexion.php";

$mensaje = ""; // Inicializamos una variable para el mensaje

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero-documento-actualizar"], $_POST["nombre-usuario-actualizar"], $_POST["contrasena-actualizar"])) {

    $numeroDocumento = $_POST["numero-documento-actualizar"];
    $nombreUsuario = $_POST["nombre-usuario-actualizar"];
    $contrasena = $_POST["contrasena-actualizar"];
    global $conn;

    $sql = "UPDATE persona SET usuario=?, contrasena=? WHERE numero_documeto=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombreUsuario, $contrasena, $numeroDocumento);

    if ($stmt->execute()) {
        $mensaje = "La actualización se ha realizado con éxito.";
    } else {
        $mensaje = "Error al actualizar la información.";
    }
}
?>