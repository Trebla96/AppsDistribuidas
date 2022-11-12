<?php
include "consults.php";

function consumptionMakeQuery()
{
    $string = "SELECT AVG(FUELCONSUMPTION_COMB) AS AVERAGE_CONSUMPTION, MAKE FROM consumption GROUP BY MAKE;";
    return $string;
}

$query_result = consultDatabase(consumptionMakeQuery());

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
