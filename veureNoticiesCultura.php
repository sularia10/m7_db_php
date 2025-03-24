




<?php
$db = new SQLite3('diariLocal.db');

// Query to fetch all news articles from the 'Cultura' section, ordered by date (newest first)
$query = "SELECT * FROM noticies WHERE not_seccio = 'Cultura' ORDER BY not_data DESC";
$result = $db->query($query);

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo $row['not_id'] . " ---- " . $row['not_titular'] . " ------ " . $row['not_cos'] . " ------ " . $row['not_data'] . " ----- " . $row['not_seccio'] . "<br>";
}

// Close the database connection
$db->close();
?>
