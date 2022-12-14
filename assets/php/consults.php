<?php

$hostName = 'localhost';    # Hostname of server
$user = 'root';             # Username of sql server
$pass = '';                 # Password of sql server
$dbName = 'consumo';        # Name of database

function consultDatabase($query)
{
    global $hostName, $user, $pass, $dbName;
    // echo "<script>console.log(" . json_encode($_ENV) . ")</script>";
    // connect to the server and select the database 
    $conn = mysqli_connect($hostName, $user, $pass, $dbName);

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
