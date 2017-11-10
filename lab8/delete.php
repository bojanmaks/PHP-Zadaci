<?php

require_once './connection.php';

require_once './navigation.html';

if(isset($_GET['code'])) {
    $code = $_GET['code'];

    $sql = 'DELETE FROM country WHERE Code = "'.$code.'"';

    $results = $link_id->query($sql);

    if (!$results) {
        echo "Query Error: $link_id->error";
        exit;
    }

    echo 'Delete successful!'."<br />\n";
    exit;
}
else if (isset($_GET['cityID'])) {
    $cityID = $_GET['cityID'];

    $sql = 'DELETE FROM city WHERE ID = '.$cityID;

    $results = $link_id->query($sql);

    if (!$results) {
        echo "Query Error: $link_id->error";
        exit;
    }

    echo 'Delete successful!'."<br />\n";
    exit;
}

