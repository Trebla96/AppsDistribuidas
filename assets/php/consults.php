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
