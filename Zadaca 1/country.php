<?php

require_once './connection.php';

$country_code = $_GET["country_code"];

$sql = 'SELECT Name,Population,Continent,Capital FROM world.country 
WHERE `Code` = "'.$country_code.'"';

//prati baranje do baza na podatoci za zemanje informacii za gradovi
$results = $link_id->query($sql);

if (!$results) {
    echo "Query Error: $link_id->error";
    exit;
}

while ($row = $results->fetch_assoc()) {
    ?>
    <h1><?php echo $row["Name"]; ?></h1>
    <br />
    <br />
    Population: <?php echo $row["Population"]; ?><br />
    Continent: <?php echo $row["Continent"]; ?><br />
    Capital: <?php echo $row["Capital"]; ?><br />
     <br />
    <?php 
    echo "<a href='http://en.wikipedia.org/wiki/".$row["Name"]."'>Wiki</a><br>";
    echo "<a href='http://localhost/phpproject2/countries.php'>Return to countries list</a>";
    
    ?>
<?php
}
?>

