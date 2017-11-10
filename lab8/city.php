<?php

require_once './connection.php';

require_once './navigation.html';

$cityID = $_GET['cityID'];

$citySql = 'SELECT * FROM `city` WHERE `ID` = '.$cityID;

$results = $link_id->query($citySql);

$cityResults = $results->fetch_assoc();

if (!$cityResults) {
    echo "Query Error: $link_id->error";
    exit;
}

$imeNaGrad        = $cityResults['Name'];
$populacijaNaGrad = $cityResults['Population'];
$regionNaGrad     = $cityResults['District'];
$kodNaDrzava      = $cityResults['CountryCode'];

?>

<html>
    <head>
        <title>Web Survey</title>
    </head>
    <body>
        <h1><?php echo $imeNaGrad; ?></h1>
        <br />
        <br />
        Country Code: <a href="country.php?code=<?php echo $kodNaDrzava; ?>"><?php echo $kodNaDrzava; ?></a>
        <br />
        Population: <?php echo $populacijaNaGrad; ?>
        <br />
        District: <?php echo $regionNaGrad; ?>
        <br />
        <a href="https://en.wikipedia.org/wiki/<?php echo $imeNaGrad; ?>">Wikipedia</a>
        <br />
    <br />
    <a href="edit_city.php?cityID=<?php echo $cityID; ?>">Edit city</a>
    <br />
    <a href="delete.php?cityID=<?php echo $cityID; ?>">Delete city</a>
    </body>
</html>  


