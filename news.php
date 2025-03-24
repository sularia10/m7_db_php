<?php
// Conectar-se a la base de dades
$db = new SQLite3('diariLocal.db');

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['not_titular'])) {
    $titular = $_POST['not_titular'];

    if (!empty($titular)) {
        echo "<p>Cerca notícies per titular: $titular</p>";

        // Consulta segura amb consulta preparada
        $stmt = $db->prepare("SELECT * FROM noticies WHERE not_titular = :titular");
        $stmt->bindValue(':titular', $titular, SQLITE3_TEXT);
        $resultats = $stmt->execute();

        // Mostrar resultats
        while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
            echo "ID: ". htmlspecialchars($fila['not_id']) ." - 
                  Titular: ". htmlspecialchars($fila['not_titular']) ." - 
                  Cos: ". htmlspecialchars($fila['not_cos']) ." - 
                  Data: ". htmlspecialchars($fila['not_data']) ." - 
                  Secció: ". htmlspecialchars($fila['not_seccio']) ."<br>";
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
        <label for="not_titular">Cerca notícies per titular:</label>
        <input type="text" name="not_titular" id="not_titular" required>
        <input type="submit" value="Cercar">
    </form>
</body>
</html>
