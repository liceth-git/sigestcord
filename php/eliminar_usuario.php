<?php
include_once "conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero-documento"])) {
    $numeroDocumento = $_POST["numero-documento"];
    global $conn;

    
    $sql = "DELETE FROM persona WHERE numero_documeto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $numeroDocumento);

    if ($stmt->execute()) {
        // La eliminación fue exitosa
        echo "exito";
    } else {
        // Hubo un error en la eliminación
        echo "error";
    }

    // Cierra la conexión y el statement
    $stmt->close();
    $conn->close();
} else {
    // Si la solicitud no es un POST o falta el número de documento
    echo "error";
}
?>
