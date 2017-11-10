<?php

require_once './connection.php';

require_once './navigation.html';

$sql = 'SELECT `ID`, `Name` FROM `city`';

//prati baranje do baza na podatoci za zemanje informacii za gradovi
$results = $link_id->query($sql);

if (!$results) {
    echo "Query Error: $link_id->error";
    exit;
}

while($row = $results->fetch_assoc()) {
    $link = '<a href="city.php?cityID='.$row['ID'].'">'.$row['ID'].'</a>';
    echo $link.' - '.$row['Name'] . "<br />\n";
}
