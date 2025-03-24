<?php
// Conectar-se a la base de dades
$db = new SQLite3('diariLocal.db');

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['not_data'])) {
    $data = trim($_POST['not_data']); // Eliminar espacios en blanco

    if (!empty($data)) {
        echo "<p>Cerca notícies que continguin: <strong>" . htmlspecialchars($data) . "</strong></p>";

        // Consulta segura amb LIKE per buscar coincidències parcials
        $stmt = $db->prepare("SELECT * FROM noticies WHERE not_data = :data");
        $stmt->bindValue(':data', $data, SQLITE3_TEXT); // "%" para buscar coincidencias parciales
        $resultats = $stmt->execute();

        // Mostrar resultats
        $trobades = false;
        while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
            $trobades = true;
            echo "ID: " . htmlspecialchars($fila['not_id']) . " - 
                  Titular: " . htmlspecialchars($fila['not_titular']) . " - 
                  Cos: " . htmlspecialchars($fila['not_cos']) . " - 
                  Data: " . htmlspecialchars($fila['not_data']) . " - 
                  Secció: " . htmlspecialchars($fila['not_seccio']) . "<br>";
        }

        // Si no hay resultados, mostrar mensaje
        if (!$trobades) {
            echo "<p style='color:red;'>No s'han trobat notícies amb aquest titular.</p>";
        }
    } else {
        echo "<p style='color:red;'>Si us plau, introdueix un titular.</p>";
    }
}

// Tancar la connexió
$db->close();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerca Notícies</title>
</head>
<body>
    <form action="" method="POST">
        <label for="not_data">Cerca notícies per titular:</label>
        <input type="text" name="not_data" id="not_data" required>
        <input type="submit" value="Cercar">
    </form>
</body>
</html>
