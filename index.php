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

                <div class="collapse navbar-collapse flex-grow-0 px-2 fs-5" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">UIB</a>
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

                <div class="col justify-content-center">
                    <!-- <img class="img-fluid" src="/assets/img/barras.webp" alt=""> -->
                    <div id="emission-by-fueltype" style="width:100%; height:400px;"></div>
                </div>

                <div class="col justify-content-center">
                    <div class="mb-3">
                        <form> <!-- action ="test.php" method ="post" -->
                        <label for="make-input" class="form-label">Manufacturer brand</label>
                        <input class="form-control" list="datalistOptions" id="make-input" name="make-input" placeholder="Type the brand (e.g. BMW)">
                        <datalist id="datalistOptions">
                            <?php
                                include "assets/php/carBrands.php";
                                $brands = getQueryResultBrands();

                                // $brands to array
                                $rows = [];
                                while ($row = mysqli_fetch_assoc($brands)) {
                                    $rows[] = $row;
                                }

                                //print options
                                foreach ($rows as $row) {
                                    echo "<option value='" . $row['MAKE'] . "'>";
                                }
                            ?>
                        </datalist>

                        </form>

                            
                    </div>

                    <div id="model-consumption-by-make" style="width:100%; height:400px;"></div>
                    <script>
                            // add event listener to input, console log the value when the user selects an option
                            document.getElementById('make-input').addEventListener('input', function(e) {
                                //verify if the value is in the list
                                let options = document.getElementById('datalistOptions').options;
                                let value = e.target.value;
                                let found = false;
                                for (let i = 0; i < options.length; i++) {
                                    if (options[i].value === value) {
                                        found = true;
                                        break;
                                    }
                                }
                                if (found) {
                                    $.post("http://localhost/consucar/assets/php/consumptionModelMark.php",
                                    {
                                        make: value
                                    },
                                    (data)=> {
                                        console.log(data)
                                        data.sort(
                                            (a, b) => {
                                                return a['AVERAGE_CONSUMPTION'] - b['AVERAGE_CONSUMPTION'];
                                            }
                                        )
                                        data = data.slice(0, 5);
                                        const my_data = data.map((item) => Number(item.AVERAGE_CONSUMPTION));
                                        const my_labels = data.map((item) => item.MODEL);

                                        const chart = Highcharts.chart('model-consumption-by-make', {
                                            chart: {
                                                type: 'bar'
                                            },
                                            title: {
                                                text: 'Consumption by model ('+value+')'
                                            },
                                            xAxis: {
                                                categories: my_labels
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'Fuel'
                                                }
                                            },
                                            series: [{
                                                name: 'Fuelseries',
                                                data: my_data
                                            }
                                            ]

                                        });
                                    },'json')

                                    //clean form
                                    document.getElementById('make-input').value = "";
                                }
                            });
                            
                        </script>
                </div>
                <div class="col">
                    <img class="img-fluid" src="http://localhost/consucar/assets/img/pie.png" alt="">
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