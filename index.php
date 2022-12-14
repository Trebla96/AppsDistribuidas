<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/iconos/co2.svg">
    <title>ConSuCar</title>

    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" m />

    <!-- Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js" defer></script>
    <script src="assets/vendor/popper/js/popper.min.js" defer></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>

    <!-- Main JS File -->
    <script type="module" src="assets/js/main.js" defer></script>
    <script type="module" src="assets/js/back-top.js"></script>
    <script type="module" src="assets/js/plots.js" defer></script>
    <script type="module" src="assets/js/map.js" defer></script>
    <script type="module" src="assets/js/fonts.js" defer></script>
    <script type="module" src="assets/js/modules/switchLightMode.js" defer></script>
    <script type="module" src="assets/js/header-resizing.js" defer></script>
    <script type="module" src="assets/js/fix-scroll-menu.js"></script>

    <!-- Highmaps -->
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/maps/modules/map.js"></script>

    <!-- Highcharts accessibility -->
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/sonification.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


</head>

<body>

    <a class="visually-hidden-focusable" href="#main-content" alt="Skip to content">Skip to main content</a>

    <!-- Header of the page -->
    <header class="sticky-top border-bottom border-secondary">

        <!-- Nav tabs -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-2 py-3">
            <div class="container-fluid">

                <!-- Brand name -->
                <a id="brand" class="navbar-brand me-auto" href="#" aria-label="link to main page">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                        <path d="M21.739 15.921c-1.347-.39-1.885-.538-3.552-.921 0 0-2.379-2.359-2.832-2.816-.568-.572-1.043-1.184-2.949-1.184h-7.894c-.511 0-.735.547-.069 1-.743.602-1.62 1.38-2.258 2.027-1.436 1.455-2.185 2.385-2.185 4.255 0 1.76 1.042 3.718 3.174 3.718h.01c.413 1.162 1.512 2 2.816 2 1.304 0 2.403-.838 2.816-2h6.367c.413 1.162 1.512 2 2.816 2s2.403-.838 2.816-2h.685c1.994 0 2.5-1.776 2.5-3.165 0-2.041-1.123-2.584-2.261-2.914zm-15.739 6.279c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm3.576-6.2c-1.071 0-3.5-.106-5.219-.75.578-.75.998-1.222 1.27-1.536.318-.368.873-.714 1.561-.714h2.388v3zm1-3h1.835c.882 0 1.428.493 2.022 1.105.452.466 1.732 1.895 1.732 1.895h-5.588v-3zm7.424 9.2c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm-7.777-16.972c0 .53-.239.926-.655.926-.412 0-.663-.376-.663-.909 0-.529.243-.925.659-.925.424-.002.659.419.659.908zm2.857 2.977c-.35 2.316-3.454 2.22-4.175.683-.941 1.75-3.791 1.283-4.024-.738-1.251-.251-2.194-1.355-2.194-2.68s.943-2.429 2.194-2.68l-.006-.055c0-1.51 1.225-2.735 2.735-2.735 1.096 0 2.034.649 2.471 1.579 1.239-1.203 3.358-.468 3.484 1.205 1.278.23 2.25 1.342 2.25 2.686 0 1.511-1.224 2.735-2.735 2.735zm-6.464-2.965c0-.606.38-.901.869-.901.218 0 .392.049.517.101l.126-.49c-.11-.056-.352-.121-.671-.121-.825 0-1.487.517-1.487 1.447 0 .776.485 1.362 1.427 1.362.331 0 .586-.061.699-.117l-.094-.481c-.121.049-.327.089-.513.089-.55 0-.873-.343-.873-.889zm4.257-.032c0-.752-.457-1.378-1.294-1.378-.804 0-1.326.611-1.326 1.427 0 .776.473 1.386 1.281 1.386.798-.001 1.339-.542 1.339-1.435zm1.66 1.548h-.695s.661-.483.661-.942c0-.335-.229-.579-.647-.579-.25 0-.466.085-.604.19l.122.309c.096-.074.235-.153.394-.153.213 0 .304.119.304.27-.007.27-.316.523-.843.999v.261h1.308v-.355zm-8.345 2.62c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1zm-2.144 1.995c0 .414-.336.75-.75.75s-.75-.336-.75-.75.336-.75.75-.75.75.335.75.75zm-1.044 2.129c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5z" />
                    </svg>
                    ConSuCar
                </a>

                <section id="accessibility-controls" class="hstack gap-3" aria-label="Accesibility options menu">
                    <!-- Change font size -->
                    <div id="font-size-container" class="dropdown-center">
                        <a class="text-primary dropdown-toggle user-select-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="font resizing options">
                            <span class="fs-2">A</span>
                            <span class="fs-6">A</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="container-fluid">
                                <div class="row font-size-menu">
                                    <button class="col-12 col-lg-4 fs-3 user-select-none" aria-label="Reduce font size">A-</button>
                                    <button class="col-12 col-lg-4 fs-3 user-select-none" aria-label="Restart font size">A</button>
                                    <button class="col-12 col-lg-4 fs-3 user-select-none" aria-label="increrase font size">A+</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- light mode switch -->
                    <div id="ligt-switch-container" class="hstack gap-5 form-check form-switch">
                        <label class="form-check-label" for="lightSwitch" role="button" aria-label="switch light mode">
                            <svg hidden id="svg-sun" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-brightness-high align-self-start" viewBox="0 0 16 16">
                                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                            </svg>
                            <svg id="svg-moon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-moon bi-brightness-high" viewBox="0 0 16 16">
                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                            </svg>
                        </label>
                        <input role="button" class="form-check-input" type="checkbox" id="lightSwitch" aria-label="light Switch to dark and light mode" />
                    </div>
                </section>

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <!-- Responsive navbar items -->
                <div class="collapse navbar-collapse flex-grow-0 fs-5" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Navigation pills (in the same page) -->
                        <li id="list-sections">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="#section-make" title="Makers">Makers</a></li>
                                <li class="nav-item"><a class="nav-link" href="#section-model" title="Models">Models</a></li>
                                <li class="nav-item"><a class="nav-link" href="#section-fuel" title="Fuel type">Fuel type</a></li>
                                <li class="nav-item"><a class="nav-link" href="#section-size" title="Engine size">Engine size</a></li>
                                <li class="nav-item"><a class="nav-link" href="#section-flight" title="Flights">Flights</a></li>
                            </ul>
                        </li>

                        <!-- Separators (only one will be shown depending on the size) -->
                        <li id="vertical-separator" class="vr ms-1"></li>
                        <li>
                            <hr id="horizontal-separator">
                        </li>

                        <!-- External links dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                External links
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <a class="dropdown-item" aria-current="page" target="_blank" aria-label="Link to the uib page" href="https://uibdigital.uib.es/uibdigital/">UIB</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" aria-current="page" target="_blank" aria-label="Link to the data of graphis, kaggle.com" href="https://www.kaggle.com/datasets/mohamedjafirashraf/fuel-consumption-co2">Data source</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" aria-current="page" target="_blank" aria-label="Link to the api, climatiq" href="https://www.climatiq.io/docs#travel-flights">API Climatiq.io</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main content of the page-->
    <main id="main-content">
        <!-- Title and subtitle -->
        <section class="d-flex justify-content-left ms-3 mt-3">
            <h1 tabindex="0">ConSuCar<br>
                <small class="text-muted">Vehicle emissions and consumption</small>
            </h1>
        </section>

        <!-- Section where all the content is placed and structured -->
        <section class="container p-sm-5 p-2">

            <!-- Barack obama cite about climate change -->
            <section class="row" data-aos="zoom-in">
                <div class="col">
                    <figure class="text-center" aria-labelledby="#barack-quote">
                        <blockquote class="blockquote">
                            <p tabindex="0">Climate change is no longer some far-off problem; it is happening here, it is happening now</p>
                        </blockquote>
                        <figcaption class="blockquote-footer" tabindex="0">
                            Barack Obama
                        </figcaption>
                    </figure>
                </div>
            </section>

            <section class="row my-4" data-aos="zoom-in">
                <div class="container-fluid col d-flex justify-content-center">
                    <div class="ratio ratio-16x9" style="max-width: 950px;">
                        <iframe id="climate-change-video-player" src="https://www.youtube.com/embed/G4H1N_yXBiA" title="Video about climatic change" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </section>


            <!-- This div is used to control which elements will be spied by the nav-pills links,
                and it will contain all the graphics-->
            <div class="mx-auto" data-bs-spy="scroll" data-bs-target="#list-sections" data-bs-offset="0" data-bs-root-margin="-30% 0px">

                <!--      Graphic 0       -->
                <!-- Consumption MarkFilt -->
                <!--                      -->
                <!-- We need to use a section and inside one div to control separately the animations
                    and the auto scroll with the navbar links -->
                <section class="container" id="section-make">
                    <div class="row my-5">
                        <!-- Title -->
                        <h1 class="display-4 mb-5 text-center" tabindex="0">Not all the makers are the same</h1>
                        <!-- Graphic -->
                        <figure class="col-12 col-lg-6 d-flex flex-column-reverse">
                            <p tabindex="0" class="highcharts-description">
                                The graph showing the average fuel consumption of each brand per 100 kilometers consists of two axes: the vertical axis represents the different car brands and the horizontal axis represents the fuel consumption in liters per 100 kilometers. There is a bar for each car brand, and the height of the bar represents the average fuel consumption for that brand. For example, if there is a high bar for brand "A", it means that brand has a relatively high fuel consumption, while if there is a low bar for brand "B", it means that brand has a relatively low fuel consumption.</p>
                            <div class="graphic" id="consumption-by-make" aria-label="graph where you can check the differences in average consumption by car brands"></div>
                        </figure>
                        <!-- Text -->
                        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                            <p tabindex="0">Due to the power of their vehicles and the degree of awareness of each brand, the level of consumption of each one is different.</p>
                            <p tabindex="0">If we do not want to contribute to the deterioration of our planet, we should be careful when choosing the manufacturer of our future car.</p>
                        </div>
                    </div>
                </section>
                <!--      Graphic 1       -->
                <!-- Consumption by Model -->
                <!--                      -->
                <section class="container" id="section-model">
                    <div class="row my-5" data-aos="fade-up">
                        <!-- Title -->
                        <h1 class="display-4 mb-5 text-center" tabindex="0">Model makes the difference</h1>
                        <!-- Div with form and graphic -->
                        <div class="col-12 col-lg-6 order-lg-2 order-1">
                            <!-- Form to select maker -->
                            <form class="mb-1" id="make-input-form">
                                <fieldset>
                                    <legend class="visually-hidden" tabindex="0">Enter a car brand in the form below to check the average fuel consumption of its models per 100 Kilometers.</legend>
                                    <!-- Title label for the input -->
                                    <label for="make-input" class="form-label">Manufacturer brand</label>
                                    <div class="input-group has-validation">
                                        <div class="form-floating">
                                            <!-- Input -->
                                            <input class="form-control" list="datalistOptionsBrand" spellcheck="false" id="make-input" name="make-input" placeholder="Type the brand (example: BMW)">
                                            <!-- Floating label -->
                                            <label class="floating-input-label">Type the brand (example: BMW)</label>
                                        </div>

                                        <!-- Text to display when the given text is invalid -->
                                        <div class="invalid-feedback pe-none">
                                            Please provide a brand from the list.
                                        </div>
                                    </div>
                                    <!-- List of all the available makers in our databaset for autocompletion -->
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
                                </fieldset>
                            </form>
                            <!-- Graphic -->
                            <figure class="d-flex flex-column-reverse">
                                <p tabindex="0" class="highcharts-description">
                                    The graph shows the differences in fuel consumption of various models of a previously selected brand. It consists of two axes: the horizontal axis represents the different car models and the vertical axis represents the fuel consumption in liters per 100 kilometers. There is a bar for each car model, and the height of the bar represents the average fuel consumption for that make. For example, if there is a high bar for model "A", it means that model has relatively high fuel consumption, while if there is a low bar for model "B", it means that model has relatively low fuel consumption.
                                </p>
                                <div class="graphic" id="model-consumption-by-make" aria-label="graph where you can see the differences in the average consumption of the 5 models that consume the least of each car brand"></div>
                            </figure>
                        </div>
                        <!-- Text -->
                        <div class="col-12 col-lg-6 order-lg-1 order-2  d-flex flex-column justify-content-center">
                            <p tabindex="0">Within each brand, we can find models with more or less consumption, so we always have to review their specifications.</p>
                            <p tabindex="0">Choosing the model wisely can be decisive in our carbon footprint.</p>
                        </div>
                    </div>
                </section>
                <!--      Graphic 2       -->
                <!-- Emission - Fuel_Type -->
                <!--                      -->
                <section class="container" id="section-fuel">
                    <div class="row my-5" data-aos="fade-up">
                        <!-- Title -->
                        <h1 class="display-4 mb-5 text-center" tabindex="0">How many emissions are produced<br> by each fuel type?</h1>
                        <!-- Graphic -->
                        <figure class="col-12 col-lg-6 d-flex flex-column-reverse">
                            <p tabindex="0" class="highcharts-description">
                                This graph shows the emissions produced by the main types of fuels. In it we see bubbles, which are larger the more emissions the fuel emits. In this case, Gasoline+ emits the least and Gasoline the most.
                            </p>
                            <div id="emission-by-fueltype" aria-label="graph of the volume of CO2 emissions according to the type of fuel"></div>

                        </figure>
                        <!-- Text -->
                        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                            <p tabindex="0">There are many types of fuel, and here we collect the most used.</p>
                            <p tabindex="0">The differences in emissions between them occur because they are not all used to the same extent and, moreover, they are not all equally polluting.</p>
                            <p tabindex="0">It can be seen that gasoline is the cause of most fuel emissions.</p>
                        </div>
                    </div>
                </section>
                <!--         Graphic 3          -->
                <!-- Consumption by Engine Size -->
                <!--                            -->
                <section class="container" id="section-size">
                    <div class="row my-5" data-aos="fade-up">
                        <!-- Title -->
                        <h1 class="display-4 mb-5 text-center" tabindex="0">Size matters</h1>
                        <!-- Graphic -->
                        <figure class="col-12 col-lg-6 order-1 order-lg-2">
                            <figure class="d-flex flex-column-reverse">
                                <p tabindex="0" class="highcharts-description">
                                    This graph shows the average consumption according to engine size on the highway and in the city. It consists of two axes: the vertical axis represents the average consumption of vehicles in liters per 100 kilometers and the horizontal axis shows the engine size in liters. In this we find two different series, one for the highway data and one for the city data.
                                </p>
                                <div class="graphic-sm" id="consumption-by-enginesize" aria-label="graph of the increase in fuel consumption according to the size of the engine"></div>

                            </figure>
                            <div class="w-100">
                                <button id="play-engine-size" type="button" class="btn btn-secondary" aria-label="play the audio of the graph">Play
                                    <!-- Play svg -->
                                    <svg id="play-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </button>
                                <button id="pause-engine-size" type="button" class="btn btn-secondary" aria-label="Pause the audio of the graph">Pause
                                    <!-- Pause svg -->
                                    <svg id="pause-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">
                                        <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                                    </svg>
                                </button>
                                <button id="rewind-engine-size" type="button" class="btn btn-secondary" aria-label="Restart the audio of the graph">
                                    Restart
                                    <!-- rewind svg -->
                                    <svg id="rewind-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                                        <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z" />
                                    </svg>
                                </button>
                            </div>
                        </figure>
                        <!-- Text -->
                        <p class="col-12 col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center gap-3">
                            <span tabindex="0">The size of the engine is a fundamental factor in the consumption of the car, and in its emissions.</span>
                            <span tabindex="0">In this case, if we want to pollute less, we could say that the smaller the better. Much better.</span>
                            <span tabindex="0">In addition, whenever we can go by highway, it will be preferable to going through the city.</span>
                        </p>
                    </div>
                </section>
                <!--           API          -->
                <!-- Flight emissions API -->
                <!--                        -->
                <section class="container" id="section-flight">
                    <div class="row my-5 justify-content-center" data-aos="fade-up">
                        <!-- Title -->
                        <h1 class="display-4 mb-5 text-center" tabindex="0">Think twice before flying</h1>
                        <div class="container col-12 col-xl-4">
                            <!-- d-flex -->
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xl-12">
                                    <form class="mb-4" id="make-input-form">
                                        <fieldset>
                                            <legend class="visually-hidden" tabindex="0">In the following form you must enter two IATA codes of two airports to calculate the volume of CO2 emissions that you would emit in case of travel.</legend>
                                            <!-- Origin Airport IATA code input -->
                                            <!-- Title label for the input -->
                                            <label for="flight-origin" class="form-label" tabindex="0">Origin</label>
                                            <div class="input-group has-validation mb-1">
                                                <div class="form-floating">
                                                    <!-- Input -->
                                                    <input data-input-iata class="form-control" list="datalistOptionsFlight" spellcheck="false" id="flight-origin" name="flight-input" placeholder="IATA code (example: PMI)">
                                                    <!-- Floating label -->
                                                    <label class="floating-input-label">IATA code (example: PMI)</label>
                                                </div>
                                                <!-- Text to display when the given text is invalid -->
                                                <div class="invalid-feedback pe-none">
                                                    Please provide a valid IATA code.
                                                </div>
                                            </div>
                                            <!-- Destination Airport IATA code input -->
                                            <!-- Title label for the input -->
                                            <label for="flight-destination" class="form-label">Destination</label>
                                            <div class="input-group has-validation">
                                                <div class="form-floating">
                                                    <!-- Input -->
                                                    <input data-input-iata class="form-control" list="datalistOptionsFlight" spellcheck="false" id="flight-destination" name="flight-input-2" placeholder="IATA code (e.g. PMI)">
                                                    <!-- Floating label -->
                                                    <label class="floating-input-label">IATA code (example: PMI)</label>
                                                </div>
                                                <!-- Text to display when the given text is invalid -->
                                                <div class="invalid-feedback pe-none">
                                                    Please provide a valid IATA code.
                                                </div>
                                            </div>
                                            <!-- Send button that no recharge the page aligned right -->
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary" id="flight-emissions-button" aria-label="Button to calculate the consumption">Calculate</button>
                                            </div>
                                            <!-- List of IATA codes available in our database for autocompletion -->
                                            <datalist id="datalistOptionsFlight">
                                                <?php
                                                include "assets/php/iataCodes.php";
                                                $iataCodes = getQueryIataCodes();
                                                // $iataCodes to options
                                                while ($row = mysqli_fetch_assoc($iataCodes)) {
                                                    echo "<option label='{$row['city']}' value='{$row['code']}'>";
                                                }
                                                ?>
                                            </datalist>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- card with the fly consumption calculated -->
                                <div class="col-12 col-lg-6 col-xl-12 d-flex justify-content-center mb-5">
                                    <div class="card w-100 text-dark bg-light" id="cocard">
                                        <!-- Card header -->
                                        <div class="card-header">
                                            <h1 class="display-6">Your flight emissions</h1>
                                        </div>
                                        <!-- Card content -->
                                        <div class="container card-body">
                                            <div class="row my-5 justify-content-center">
                                                <!-- Origin -->
                                                <div class="col-5 text-center">
                                                    <p class="card-text fw-semibold">Origin</p>
                                                    <p class="card-text" id="selected-airport-origin">-</p>
                                                </div>
                                                <!-- Plane arros -->
                                                <svg class="col-2 align-self-center" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#0d6efd" class="bi bi-airplane-engines-fill" viewBox="0 0 16 16">
                                                    <g transform="
                                                    translate(8, 8)
                                                    rotate(90)
                                                    translate(-8,-8)
                                                    ">
                                                        <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0Z" />
                                                    </g>
                                                </svg>
                                                <!-- Destination -->
                                                <div class="col-5 text-center">
                                                    <p class="card-text fw-semibold">Destination</p>
                                                    <p class="card-text" id="selected-airport-destination">-</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Flight consumption -->
                                        <div class="card-footer">
                                            <p class="card-text text-center fw-semibold fs-5"><span id="consumption_calculated">-</span> <abbr title="kilograms of carbon dioxide">kgCO2</abbr></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Map graphic -->
                        <div class="col-12 col-lg-8">
                            <figure class="graphic" id="flight-emissions" aria-label="Earth globe where the flight routes are drawed"></figure>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>

    <!-- Arrow link to come back to the top -->
    <a class="back-to-top opacity-0" id="go-top-button" href="#" aria-label="Button to go to the top of the page">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
        </svg>
    </a>

    <!-- Footer with copyright -->
    <footer>

        <div class="container-fluid justify-content-center p-3 text-center">
            <div class="row">
                <div class="col">
                    <a class="link-primary" href="accessibility.html">Accessibility</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="text-secondary">&copy; ConSuCar 2022</span>
                </div>
            </div>
        </div>

    </footer>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        const isMobile = window.matchMedia('only screen and (max-width: 768px)').matches;
        const userReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        AOS.init({
            disable: isMobile || userReducedMotion,
        });
    </script>
</body>

</html>