<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/consucar/assets/img/iconos/co2.svg">
    <title>ConSuCar</title>

    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- plot.js?¿?¿ -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js" defer></script>
    <script src="assets/vendor/popper/js/popper.min.js" defer></script>
    <!--     <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js" defer></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>

    <!-- Main JS File -->
    <script type="module" src="http://localhost/consucar/assets/js/main.js" defer></script>
    <script type="module" src="http://localhost/consucar/assets/js/modules/switchLightMode.js" defer></script>

    <!-- Higcharts js ejemplos https://www.highcharts.com/demo  -->
    <!-- <script src="https://code.highcharts.com/highcharts.js" defer></script> -->
    <script src="assets/vendor/highcharts/code/highcharts.js"></script>

</head>

<body class="flex-column">
    <header class="flex-row">

        <!-- Nav tabs -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light px-2 py-3">
            <div class="container-fluid">

                <a id="brand" class="navbar-brand flex-grow-1" href="#">
                    <!-- <img src="http://localhost/consucar/assets/img/iconos/car-co2.svg" alt="" width="50" height="50"> -->
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                        <path d="M21.739 15.921c-1.347-.39-1.885-.538-3.552-.921 0 0-2.379-2.359-2.832-2.816-.568-.572-1.043-1.184-2.949-1.184h-7.894c-.511 0-.735.547-.069 1-.743.602-1.62 1.38-2.258 2.027-1.436 1.455-2.185 2.385-2.185 4.255 0 1.76 1.042 3.718 3.174 3.718h.01c.413 1.162 1.512 2 2.816 2 1.304 0 2.403-.838 2.816-2h6.367c.413 1.162 1.512 2 2.816 2s2.403-.838 2.816-2h.685c1.994 0 2.5-1.776 2.5-3.165 0-2.041-1.123-2.584-2.261-2.914zm-15.739 6.279c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm3.576-6.2c-1.071 0-3.5-.106-5.219-.75.578-.75.998-1.222 1.27-1.536.318-.368.873-.714 1.561-.714h2.388v3zm1-3h1.835c.882 0 1.428.493 2.022 1.105.452.466 1.732 1.895 1.732 1.895h-5.588v-3zm7.424 9.2c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm-7.777-16.972c0 .53-.239.926-.655.926-.412 0-.663-.376-.663-.909 0-.529.243-.925.659-.925.424-.002.659.419.659.908zm2.857 2.977c-.35 2.316-3.454 2.22-4.175.683-.941 1.75-3.791 1.283-4.024-.738-1.251-.251-2.194-1.355-2.194-2.68s.943-2.429 2.194-2.68l-.006-.055c0-1.51 1.225-2.735 2.735-2.735 1.096 0 2.034.649 2.471 1.579 1.239-1.203 3.358-.468 3.484 1.205 1.278.23 2.25 1.342 2.25 2.686 0 1.511-1.224 2.735-2.735 2.735zm-6.464-2.965c0-.606.38-.901.869-.901.218 0 .392.049.517.101l.126-.49c-.11-.056-.352-.121-.671-.121-.825 0-1.487.517-1.487 1.447 0 .776.485 1.362 1.427 1.362.331 0 .586-.061.699-.117l-.094-.481c-.121.049-.327.089-.513.089-.55 0-.873-.343-.873-.889zm4.257-.032c0-.752-.457-1.378-1.294-1.378-.804 0-1.326.611-1.326 1.427 0 .776.473 1.386 1.281 1.386.798-.001 1.339-.542 1.339-1.435zm1.66 1.548h-.695s.661-.483.661-.942c0-.335-.229-.579-.647-.579-.25 0-.466.085-.604.19l.122.309c.096-.074.235-.153.394-.153.213 0 .304.119.304.27-.007.27-.316.523-.843.999v.261h1.308v-.355zm-8.345 2.62c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1zm-2.144 1.995c0 .414-.336.75-.75.75s-.75-.336-.75-.75.336-.75.75-.75.75.335.75.75zm-1.044 2.129c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5z" />
                    </svg>
                    ConSuCar
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse flex-grow-0 px-2 fs-5" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link hover-shadow" aria-current="page" target="_blank" href="https://www.kaggle.com/datasets/mohamedjafirashraf/fuel-consumption-co2">UIB</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" target="_blank" href="https://uibdigital.uib.es/uibdigital/">Data source</a>
                        </li>


                        <!-- <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                External links
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="dropdown-item" aria-current="page" target="_blank" href="https://uibdigital.uib.es/uibdigital/">Data source</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item" aria-current="page" target="_blank" href="https://www.kaggle.com/datasets/mohamedjafirashraf/fuel-consumption-co2">UIB</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Barras</a></li>
                                <li><a class="dropdown-item" href="#">Tendencia</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Extra</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div class="form-check form-switch ms-auto mt-3 me-3">
            <label class="form-check-label ms-3" for="lightSwitch">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                </svg>
            </label>
            <input class="form-check-input" type="checkbox" id="lightSwitch" />
        </div>

        <div class="container">
            <div class="row-cols-1 justify-content-center">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p>Climate change is no longer some far-off problem; it is happening here, it is happening now</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Barack Obama
                    </figcaption>
                </figure>
            </div>
        </div>




        <div class="container-fluid">
            <div class="row">
                <h1>Graphic title / question</h1>
                <!-- Emission - Fuel_Type -->
                <div class="col justify-content-center">
                    <div id="emission-by-fueltype" style="width:100%; height:400px;"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Consumption by Model -->
                <div class="col-md justify-content-center">
                    <div class="mb-3">
                        <form id="make-input-form">
                            <!-- action ="test.php" method ="post" -->
                            <label for="make-input" class="form-label">Manufacturer brand</label>
                            <input class="form-control" list="datalistOptionsBrand" spellcheck="false" id="make-input" name="make-input" placeholder="Type the brand (e.g. BMW)">
                            <datalist id="datalistOptionsBrand">
                                <?php
                                include "assets/php/carBrands.php";
                                $brands = getQueryResultBrands();

                                // $brands to options
                                while ($row = mysqli_fetch_assoc($brands)) {
                                    echo "<option value='{$row['MAKE']}'>";
                                }
                                ?>
                            </datalist>
                        </form>
                    </div>
                    <div id="model-consumption-by-make" style="width:100%; height:400px;"></div>
                </div>

            </div>
            <div class="row">
                <!-- Consumption by Engine Size -->
                <div class="col justify-content-center">
                    <div id="consumption-by-enginesize" style="width:100%; height:400px;"></div>
                </div>

            </div>
        </div>
    </main>

    <footer>

        <div class="container">
            <span>&copy;2022</span>
        </div>

    </footer>



</body>

</html>