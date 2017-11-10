<?php

require_once './connection.php';

require_once './navigation.html';

$code = $_GET['code'];

$sql = 'SELECT `Name`, `Population`, `Capital`, `Continent`
FROM `country` 
WHERE `Code` = "'.$code.'"';
//             "FRA"

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
    Capital: <?php echo $row["Capital"]; ?><br />
    Continent: <?php echo $row["Continent"]; ?><br />
    <a href="https://en.wikipedia.org/wiki/<?php echo $row['Name']; ?>">Wikipedia</a>
    <br />
    <br />
    <a href="edit_country.php?code=<?php echo $code; ?>">Edit country</a>
    <br />
    <a href="delete.php?code=<?php echo $code; ?>">Delete country</a>
<?php
}

