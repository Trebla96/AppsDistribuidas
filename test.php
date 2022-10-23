<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include "assets/php/consultas.php";
    ?>
</head>

<body>
    <?php
    $result = consultDatabase("SELECT CountryCode from country WHERE ShortName='Albania'");
    $row = mysqli_fetch_array($result);
    echo "{$row['CountryCode']}";
    ?>
</body>

</html>