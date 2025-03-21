<?php
$db = new SQLite3('diariLocal.db');
$query = "SELECT * FROM noticies WHERE strftime('%m', data) = '02' ORDER BY data DESC";
$result = $db-> query($query);

foreach ($result as $row){
    echo $row['not_data'] . "---" . $row['not_titular']
}

?>