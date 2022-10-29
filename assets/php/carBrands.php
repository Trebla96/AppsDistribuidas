<?php
include "consults.php";

function brandsQuery()
{
    return "SELECT DISTINCT consumption.MAKE FROM consumption;";
}

function getQueryResultBrands()
{
    return consultDatabase(brandsQuery());
}
