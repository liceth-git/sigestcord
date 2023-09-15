<?php
include_once "conexion.php";

// Define el número de cédula que deseas buscar
$numeroDocumentoConsulta = ""; // Reemplaza con el número de cédula que desees probar

// Comenta o deshabilita la parte que toma los datos del formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero-documento-consulta"])) {
     $numeroDocumentoConsulta = $_POST["numero-documento-consulta"];
}

$sql = "SELECT p.tipoDocumento, p.Pnombre, p.Snombre, p.Papellido, p.Sapellido, c.email, t.telefono, r.Descripcion AS Rol
    FROM persona AS p
    LEFT JOIN correo AS c ON p.documento = c.documento
    LEFT JOIN telefono AS t ON p.documento = t.documento
    LEFT JOIN rol AS r ON p.IdRol = r.IdRol
    WHERE p.documento = '$numeroDocumentoConsulta'";


$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Imprime los datos del usuario encontrados
        echo "Nombre: " . $row["Pnombre"] . " " . $row["Snombre"] . "<br>";
        echo "Apellidos: " . $row["Papellido"] . " " . $row["Sapellido"] . "<br>";
        echo "Correo: " . $row["email"] . "<br>";
        echo "Teléfono: " . $row["telefono"] . "<br>";
        
        // Comprueba si la columna "Descripcion" está definida
        if (isset($row["Rol"])) {
            echo "Rol: " . $row["Rol"] . "<br>";
        } else {
            echo "Rol: Sin asignar <br>";
        }
    }
} else {
    // Imprime un mensaje de usuario no encontrado
    echo "Usuario no encontrado en la base de datos.";
}

?>
