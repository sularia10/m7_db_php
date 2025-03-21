<?php
$db = new SQLite3('diariLocal.db');

if (isset($_GET['not_seccio']) && !empty($_GET['not_seccio'])) {
    $seccio = $_GET['not_seccio']; // Recuperar el parámetro de la URL de forma segura

    // Utilizar sentencias preparadas para evitar inyecciones SQL
    $query = "SELECT * FROM noticies WHERE not_seccio = :not_seccio ORDER BY not_data DESC";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':not_seccio', $seccio, SQLITE3_TEXT); // Enlazar el parámetro de forma segura

    // Ejecutar la consulta
    $result = $stmt->execute();
    if ($result) {
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "id: " . $row['not_id'] . " ---- Titular: " . $row['not_titular'] . " ------ Cos: " . $row['not_cos'] . " ------ Data: " . $row['not_data'] . " ----- Secció: " . $row['not_seccio'] . "<br>";
        }
    } else {
        echo "No se encontraron noticias en la sección especificada.<br>";
    }
} else {
    echo "Por favor, especifica una sección en la URL usando el parámetro 'not_seccio'.<br>";
}

$db->close();

//veureNoticiesSeccio.php?not_seccio=Cultura

?>
