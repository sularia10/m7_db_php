<?php
$db = new SQLite3('diariLocal.db');

// Query to fetch all records where the month of 'not_data' is February, sorted in descending order
$query = "SELECT * FROM noticies WHERE strftime('%m', not_data) = '02' ORDER BY not_data DESC";

// Execute the query and fetch results
$result = $db->query($query);

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo $row['not_id'] . " ---- " . $row['not_titular'] . " ------ " . $row['not_cos'] . " ------ " . $row['not_data'] . " ----- " . $row['not_seccio'] . "<br>";
}

// Close the database connection
$db->close();
?>
