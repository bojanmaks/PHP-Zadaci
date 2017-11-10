<?php

require_once './connection.php';

$code = $_GET['code'];

$sql = 'SELECT `Name`, `Population`, `Continent` FROM `country` WHERE Code = "'.$code.'"';

//prati baranje do baza na podatoci za zemanje informacii za gradovi
$countryResults = $link_id->query($sql);

if (!$countryResults) {
    echo "Query Error: $link_id->error";
    exit;
}

$results = $countryResults->fetch_assoc();
?>

<html>
    <head>
        <title>Web Survey</title>
    </head>
    <body>
        <h1>Country informations</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="countryCode" value="<?php echo $code; ?>" />
            <input type="hidden" name="update" value="country" />
            Name: <input type="text" name="countryName" value="<?php echo $results['Name']; ?>" />
            <br />
            <br />
            Population: <input type="text" name="countryPopulation" value="<?php echo $results['Population']; ?>" />
            <br />
            <br />
            Continent: <input type="text" name="countryContinent" value="<?php echo $results['Continent']; ?>" />
            <br />
            <br />
            <input type="submit" name="action" value="Update" />
        </form>
    </body>
</html>    