<?php

require_once './connection.php';

if($_POST) {
    $update = $_POST['update'];
    
    if($update == 'country') {
        $imeNaDrzava        = $_POST['countryName'];
        $kontinentNaDrzava  = $_POST['countryContinent'];
        $populacijaNaDrzava = $_POST['countryPopulation'];
        $kodNaDrzava        = $_POST['countryCode']; 

        $sql = 'UPDATE country SET `Name` = "'.$imeNaDrzava.'", `Continent` = "'.$kontinentNaDrzava.'", `Population` = '.$populacijaNaDrzava.' 
        WHERE `Code` = "'.$kodNaDrzava.'"';

        //prati baranje do baza na podatoci za zemanje informacii za gradovi
        $results = $link_id->query($sql);

        if (!$results) {
            echo "Query Error: $link_id->error";
            exit;
        }

        echo 'Update successful!'."<br />\n";
        echo '<a href="country.php?code='.$kodNaDrzava.'">Return to country form</a>';
        exit;

    }
    else if($update == 'city') {
        $cityID        = $_POST['cityID'];
        $imeNaGrad     = $_POST['cityName'];
        $populacijaNaGrad = $_POST['cityPopulation'];
        $regionNaGrad        = $_POST['cityDistrict']; 

        $sql = 'UPDATE city SET `Name` = "'.$imeNaGrad.'", `District` = "'.$regionNaGrad.'", `Population` = '.$populacijaNaGrad.' 
        WHERE `ID` = "'.$cityID.'"';

        //prati baranje do baza na podatoci za zemanje informacii za gradovi
        $results = $link_id->query($sql);

        if (!$results) {
            echo "Query Error: $link_id->error";
            exit;
        }

        echo 'Update successful!'."<br />\n";
        echo '<a href="city.php?cityID='.$cityID.'">Return to city form</a>';
        exit;
    }
}
