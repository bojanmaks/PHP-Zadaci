<?php

require_once './connection.php';

require_once './navigation.html';

$sql = 'SELECT `Code`, `Name` FROM `country`';

$results = $link_id->query($sql);

if (!$results) {
    echo "Query Error: $link_id->error";
    exit;
}

while($row = $results->fetch_assoc()) {
    $link = '<a href="country.php?code='.$row['Code'].'">'.$row['Code'].'</a>';
    echo $link.' - '.$row['Name'] . "<br />\n";
}

