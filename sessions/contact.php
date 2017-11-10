<?php

session_start();

if($_SESSION['logiran'] == 1) {
    echo 'Hi '.$_SESSION['username'].',';
    echo '<a href="logout.php">Log out</a>';
}
else {
    require_once './logindb.php';
}

