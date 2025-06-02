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

// Especialidades disponibles
$especialidades = ["Cardiología", "Pediatría", "Dermatología", "Psiquiatría", "Ginecología"];

// Nombres ficticios para médicos
$nombreMedico = ["Dr. Juan Pérez", "Dra. Ana López", "Dr. Carlos García", "Dra. Laura Sánchez", "Dr. Luis Fernández", "Dra. María Rodríguez", "Dr. Roberto Díaz", "Dra. Patricia Martínez", "Dr. Antonio Gómez", "Dra. Isabel Torres"];

// Municipios ficticios
$municipios = ["Ciudad de México", "Guadalajara", "Monterrey", "Puebla", "Cancún"];

// Direcciones ficticias
$direcciones = ["Calle 123, Zona Centro", "Avenida 45, Colonia Obrera", "Callejón 7, Fraccionamiento Las Palmas", "Boulevard 3, Sector 2", "Calle del Sol, Edificio 3"];

// Teléfonos ficticios
$telefonos = ["555-1234", "555-5678", "555-9876", "555-4321", "555-8765"];

// Insertar 25 médicos de cada especialidad
foreach ($especialidades as $especialidad) {
    for ($i = 0; $i < 25; $i++) {
        // Seleccionar un médico, municipio, dirección y teléfono aleatorio
        $nombre = $nombreMedico[array_rand($nombreMedico)];
        $municipio = $municipios[array_rand($municipios)];
        $direccion = $direcciones[array_rand($direcciones)];
        $telefono = $telefonos[array_rand($telefonos)];

        // Insertar datos en la base de datos
        $sql = "INSERT INTO medicos (nombre, especialidad, municipio, direccion, telefono)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $especialidad, $municipio, $direccion, $telefono);

        if ($stmt->execute()) {
            echo "Médico $nombre registrado correctamente en especialidad $especialidad.<br>";
        } else {
            echo "Error al registrar médico: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
