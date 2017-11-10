<?php

require_once './connection.php';

$cityID = $_GET['cityID'];

$sql = 'SELECT `Name`, `Population`, `District` FROM `city` WHERE ID = "'.$cityID.'"';

//prati baranje do baza na podatoci za zemanje informacii za gradovi
$results = $link_id->query($sql);

if (!$results) {
    echo "Query Error: $link_id->error";
    exit;
}

$results = $results->fetch_assoc();
?>

<html>
    <head>
        <title>Web Survey</title>
    </head>
    <body>
        <h1>City informations</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="cityID" value="<?php echo $cityID; ?>" />
            <input type="hidden" name="update" value="city" />
            Name: <input type="text" name="cityName" value="<?php echo $results['Name']; ?>" />
            <br />
            <br />
            Population: <input type="text" name="cityPopulation" value="<?php echo $results['Population']; ?>" />
            <br />
            <br />
            District: <input type="text" name="cityDistrict" value="<?php echo $results['District']; ?>" />
            <br />
            <br />
            <input type="submit" name="action" value="Update" />
        </form>
    </body>
</html>    
