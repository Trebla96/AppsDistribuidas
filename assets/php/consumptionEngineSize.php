<?php
include "consults.php";

function modelsQuery()
{
    return "SELECT consumption.ENGINESIZE, avg(consumption.FUELCONSUMPTION_CITY) AS AVERAGE_CONSUMPTION_CITY, avg(consumption.FUELCONSUMPTION_HWY) AS AVERAGE_CONSUMPTION_HWY FROM consumption GROUP BY ENGINESIZE ORDER BY ENGINESIZE;";
}

$query_result = consultDatabase(modelsQuery());

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
