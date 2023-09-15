<?php
include_once "conexion.php";

$tipoDocumento = $_POST["tipoDocumento"];
$numeroDocumento = $_POST["documento"]; 
$primerNombre = $_POST["primerNombre"]; 
$segundoNombre = $_POST["segundoNombre"];
$primerApellido = $_POST["PrimerAepllido"]; 
$segundoApellido = $_POST["SegundoApellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

// Inicia una transacción
$conn->begin_transaction();

// Sentencia SQL para insertar en la tabla persona
$sqlp = "INSERT INTO persona (documento, tipoDocumento, Pnombre, Snombre, Papellido, Sapellido) 
VALUES ('$numeroDocumento', '$tipoDocumento', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido')";

// Sentencia SQL para insertar en la tabla correo
$sqlc = "INSERT INTO correo (documento, email) VALUES ('$numeroDocumento', '$email')";

// Sentencia SQL para insertar en la tabla telefono
$sqlt = "INSERT INTO telefono (documento, telefono) VALUES ('$numeroDocumento', '$telefono')";

// Ejecuta las sentencias SQL
if ($conn->query($sqlp) === TRUE && $conn->query($sqlc) === TRUE && $conn->query($sqlt) === TRUE) {
    // Si todas las inserciones son exitosas, confirma la transacción
    $conn->commit();
    echo "<script>mostrarMensajeExito();</script>";
} else {
    // Si ocurre algún error, cancela la transacción
    $conn->rollback();
    echo "Error al insertar registros: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
