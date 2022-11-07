<?php
include "consults.php";

function consumptionMakeFiltersQuery($filter)
{
    if ($filter == "") {
        $string = "SELECT AVG(FUELCONSUMPTION_COMB) AS AVERAGE_CONSUMPTION, MAKE FROM consumption GROUP BY MAKE;";
    } else {
        $string = "SELECT AVG(FUELCONSUMPTION_COMB) AS AVERAGE_CONSUMPTION, MAKE FROM consumption GROUP BY MAKE;";
    }

    return $string;
}

$query_result = consultDatabase(consumptionMakeFiltersQuery($_POST['filter']));

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
