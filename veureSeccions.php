<?php
$db = new SQLite3('diariLocal.db');

// Query to fetch distinct sections, ordered alphabetically
$query = "SELECT DISTINCT not_seccio FROM noticies ORDER BY not_seccio ASC";
$result = $db->query($query);

// Display each section
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo $row['not_seccio'] . "<br>";
}

// Close the database connection
$db->close();
?>
