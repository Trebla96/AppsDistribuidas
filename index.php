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

                <a class="navbar-brand flex-grow-1" href="#">
                    <img src="http://localhost/consucar/assets/img/iconos/car-co2.svg" alt="" width="50" height="50">
                    ConSuCar
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="form-check form-switch ms-auto mt-3 me-3">
                    <label class="form-check-label ms-3" for="lightSwitch">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="25"
                        height="25"
                        fill="currentColor"
                        class="bi bi-brightness-high"
                        viewBox="0 0 16 16"
                        >
                        <path
                            d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
                        />
                        </svg>
                    </label>
                    <input class="form-check-input" type="checkbox" id="lightSwitch" />
                </div>

                <div class="collapse navbar-collapse flex-grow-0 px-2 fs-5" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" target="_blank" href="https://uibdigital.uib.es/uibdigital/">UIB</a>
                        </li>

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Lista Graficos
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Barras</a></li>
                                <li><a class="dropdown-item" href="#">Tendencia</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Extra</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">

        <div class="container-fluid">
            <div class="row">

                <!-- Emission - Fuel_Type -->
                <div class="col justify-content-center">
                    <div id="emission-by-fueltype" style="width:100%; height:400px;"></div>
                </div>
                
                <!-- Consumption by Model -->
                <div class="col justify-content-center">
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