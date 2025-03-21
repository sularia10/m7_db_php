<?php
$db = new SQLite3('diariLocal.db');

// Query to count the total number of articles from February
$query = "SELECT COUNT(*) AS total FROM noticies WHERE strftime('%m', not_data) = '02'";
$result = $db->query($query);

// Fetch and display the total count
if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "Total articles in February: " . $row['total'] . "<br>";
}

$db->close();
?>
