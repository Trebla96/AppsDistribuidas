<?php

function consultDatabase($query)
{
    // connect to the server and select the database
    $conn = mysqli_connect('localhost', 'root', '', 'worlddevelopment');

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


$QUERY_ALL_COUNTRIES = "SELECT * FROM country";



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
