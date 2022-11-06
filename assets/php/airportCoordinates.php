<?php
include "consults.php";

function coordinatesQuery($iata1, $iata2)
{
    return "SELECT code, city, lat, lon FROM airports WHERE airports.CODE IN ('{$iata1}', '{$iata2}');";
}

$query_result = consultDatabase(coordinatesQuery($_GET['iata1'], $_GET['iata2']));

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}

exit(json_encode($rows));