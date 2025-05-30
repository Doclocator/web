
<?php
// Configuración de conexión
$host = "localhost";
$usuario = "root"; // Cambiar si es necesario
$contrasena = "123456789";  // Cambiar si es necesario
$baseDeDatos = "doclocator";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$municipio = $_POST['municipio'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

// Insertar datos
$sql = "INSERT INTO medicos (nombre, especialidad, municipio, direccion, telefono)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $especialidad, $municipio, $direccion, $telefono);

if ($stmt->execute()) {
    echo "Médico registrado correctamente.";
} else {
    echo "Error al registrar médico: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>