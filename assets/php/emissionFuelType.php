<?php
include "consults.php";

function emissionFueltype()
{
    $string = "SELECT AVG(CO2EMISSIONS) AS media, FUELTYPE FROM consumption GROUP BY FUELTYPE ORDER BY media;";
    return $string;
}

$query_result = consultDatabase(emissionFueltype());

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
