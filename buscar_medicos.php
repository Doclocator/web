<?php
$host = "localhost";
$user = "root";
$password = "123456789";
$db = "doclocator";

// Conexión a la base de datos
$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Obtener parámetros con validación
$municipio = $_GET['municipio'] ?? '';
$especialidad = $_GET['especialidad'] ?? '';

// Preparar consulta SQL
$sql = "SELECT nombre, especialidad, municipio, direccion, telefono 
        FROM medicos 
        WHERE municipio LIKE ? AND especialidad LIKE ?";

$stmt = $mysqli->prepare($sql);

// Utilizar comodines para búsqueda parcial
$param_municipio = "%$municipio%";
$param_especialidad = "%$especialidad%";

$stmt->bind_param("ss", $param_municipio, $param_especialidad);
$stmt->execute();

// Obtener resultados
$result = $stmt->get_result();
$medicos = [];

while ($row = $result->fetch_assoc()) {
    $medicos[] = $row;
}

// Devolver como JSON
header('Content-Type: application/json');
echo json_encode($medicos);
?>