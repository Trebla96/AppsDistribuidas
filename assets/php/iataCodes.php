<?php
#include "consults.php"; uf... no se puede poner porque al meterlo en index da un error donde dice que no se puede volver a declarar consultDatabase

function iataCodesQuery()
{
    $string = "SELECT code, city FROM airports;";
    return $string;
}

function getQueryIataCodes()
{
    return consultDatabase(iataCodesQuery());
}
