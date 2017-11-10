<?php

require_once './connection.php';



$IDnaGrad = $_POST['cityID'];
$imeNaGrad = $_POST['cityName'];
$regionNaGrad = $_POST['cityDistrict'];
$populacijaNaGrad = $_POST['cityPopulation'];



if ($_POST['azuriraj'] == 'Submit') {


    $sql = 'UPDATE city SET `Name` = "' . $imeNaGrad . '", `District` = "' . $regionNaGrad . '", `Population` = ' . $populacijaNaGrad . ' 
WHERE `ID` = ' . $IDnaGrad;

//prati baranje do baza na podatoci za zemanje informacii za gradovi
    $results = $link_id->query($sql);

    if (!$results) {
        echo "Query Error: $link_id->error";
        exit;
    }

    echo 'Update successful!';
    echo '<a href="cityinfo.php?cityID=' . $IDnaGrad . '">Return to city form</a>';
    exit;
} else if ($_POST['azuriraj'] == 'Brisi') {
    $sql2 = 'DELETE FROM world.city WHERE ID =' . $IDnaGrad;
    $brisenje = $link_id->query($sql2);
    echo "Izbrisan zapis";
} else {
    echo "Greska";
    exit;
}


