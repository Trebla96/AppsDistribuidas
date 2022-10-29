<?php
include "consults.php";

function models($make)
{
    $string = "SELECT consumption.MODEL, consumption.FUELCONSUMPTION_COMB FROM consumption WHERE consumption.MAKE = '{$make}';";
    return $string;
}

$query_result = consultDatabase(models($_POST['make']));

$rows = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}


exit(json_encode($rows));
