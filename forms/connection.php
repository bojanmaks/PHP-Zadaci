<?php

require_once './connection_info.php';
//Vospostavi konekcija do baza world
$link_id = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Proveri dali konekcijata e uspeshna
if ($link_id->connect_error) {
    echo "Connection Error ($link_id->connect_errno) "
            . "$link_id->connect_error\n";
    exit;
}

