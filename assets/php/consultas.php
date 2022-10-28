<?php


function consultDatabase($query)
{
    // connect to the server and select the database 
    //CAMBIAR NOMRE DE LA BASE DE DATOS!!!!!!!!!
    $conn = mysqli_connect('localhost', 'root', '', 'consumo');

    // check connection
    if (!$conn) {
        die('Connection error: ' . mysqli_connect_error());
    }

    //Make the query
    $result = mysqli_query($conn, $query);


    // close the connection
    mysqli_close($conn);

    return $result;
}



function createIndicatorCodeQuery($indicatorCode)
{
    $QUERY_DATA_BY_INDICATOR = "SELECT CountryName, CountryCode Value FROM indicators WHERE indicatorCode = '{$indicatorCode}' AND Year = 1980";
    return $QUERY_DATA_BY_INDICATOR;
}


$INDICATOR_CODE_DEATH_RATE = "SP.DYN.CDRT.IN";




/* $countries = consultDatabase($QUERY_ALL_COUNTRIES); */

// echo <<<EOT
//     <html>
//     <head>
//         <title>World Development</title>
//         <link rel="stylesheet" href="assets/css/style.css">
//     </head>
//     <body>
//     <h1>{$a}</h1>
//     </body>
//     </html>
// EOT;
