<?php
$db = new SQLite3('diariLocal.db');

// Query to fetch distinct sections, ordered alphabetically
$query = "SELECT DISTINCT not_seccio FROM noticies ORDER BY not_seccio ASC";
$result = $db->query($query);

// Display each section as a clickable link
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $seccio = urlencode($row['not_seccio']); // Encode the section name for safe use in the URL
    echo "<a href='veureNoticiesSeccio.php?not_seccio=$seccio'>" . htmlspecialchars($row['not_seccio']) . "</a><br>";
}

$db->close();
?>
