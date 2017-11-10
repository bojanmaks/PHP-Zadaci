<?php

$cityID = $_GET['cityID'];

require_once './connection.php';

$sql = 'SELECT `Code`, `Name` FROM `country`';

//prati baranje do baza na podatoci za zemanje informacii za gradovi
$countryResults = $link_id->query($sql);

if (!$countryResults) {
    echo "Query Error: $link_id->error";
    exit;
}

$citySql = 'SELECT * FROM `city` WHERE `ID` = '.$cityID;

$city = $link_id->query($citySql);

$cityResults = $city->fetch_assoc();

if (!$cityResults) {
    echo "Query Error: $link_id->error";
    exit;
}

?>

<html>
    <head>
        <title>Web Survey</title>
    </head>
    <body>
        <h1>City informations</h1>
        <form action="updateCity.php" method="POST">
            <input type="hidden" name="cityID" value="<?php echo $cityResults['ID']; ?>" />
            Country: 
            <select name="countryCode">
                <?php
                
                    while ($row = $countryResults->fetch_assoc()) {
                        if($row['Code'] == $cityResults['CountryCode']) {
                            // samo ednash
                            echo '<option value="'.$row['Code'].'" selected>'.$row['Name'].'</option>';
                        }
                        else {
                            // za site ostanati drzavi
                            echo '<option value="'.$row['Code'].'">'.$row['Name'].'</option>';
                        }
                    }
                
                ?>
            </select>
            <br />
            <br />
            City Name: <input type="text" name="cityName" value="<?php echo $cityResults['Name']; ?>" />
            <br />
            <br />
            District: <input type="text" name="cityDistrict" value="<?php echo $cityResults['District']; ?>" />
            <br />
            <br />
            Population: <input type="text" name="cityPopulation" value="<?php echo $cityResults['Population']; ?>" />
            <br />
            <br />
            <input type="submit" name="azuriraj" value="Submit" />
            <input type="submit" name="azuriraj" value="Brisi" />
        </form>
    </body>
</html>    