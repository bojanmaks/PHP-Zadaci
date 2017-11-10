<?php
require_once 'connection.php';
$link_id = new mysqli($dbHost,$dbUsername,$dbPassword,'world');
if ($link_id->connect_error) {
    echo "Connection Error ($link_id->connect_errno) "
            . "$link_id->connect_error\n";
    exit;
}
$sql = $link_id->query('SELECT Name,Code FROM world.country');
if (!$sql) {
    echo "Query Error: $link_id->error";
    exit;
}


while($row = $sql->fetch_assoc()){
    $link ="<a href='http://localhost/phpproject2/country.php?country_code=".$row["Code"]."'>".$row["Code"]."</a>";
    echo $link." - ".$row["Name"]." <br>";
}