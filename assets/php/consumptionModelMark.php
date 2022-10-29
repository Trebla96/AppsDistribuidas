<?php
include "consults.php";

function modelsQuery($make)
{
    return "SELECT consumption.MODEL, avg(consumption.FUELCONSUMPTION_COMB) as AVERAGE_CONSUMPTION FROM consumption WHERE consumption.MAKE = '{$make}' GROUP BY MODEL;";
}

$query_result = consultDatabase(modelsQuery($_POST['make']));

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
