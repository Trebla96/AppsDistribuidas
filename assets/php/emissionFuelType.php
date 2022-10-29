<?php
include "consults.php";

function emissionFueltypeQuery()
{
    $string = "SELECT AVG(CO2EMISSIONS) AS AVERAGE_EMISSIONS, FUELTYPE FROM consumption GROUP BY FUELTYPE ORDER BY AVERAGE_EMISSIONS;";
    return $string;
}

$query_result = consultDatabase(emissionFueltypeQuery());

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
