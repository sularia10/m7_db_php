<?php
$db = new SQLite3('diariLocal.db');
$query = "SELECT * FROM noticies ORDER BY data DESC";
$result = $db-> query($query);

foreach($result as $row){
    echo $row['data'] . "----" . $row['titol'] . "<br>"
}
?>