# ConSuCar

ConSuCar es una aplicación que permite consultar el consumo y emisiones de algunos vehículos, marcas e incluso de vuelos.

## Tabla de contenidos

1. [Descripción](#descripción-del-proyecto)
    1. [Introducción](#introducción)
    2. [Tecnologóas](#tecnologías)
    3. [Origen de los datos](#origen-de-los-datos)
2. [Instalación](#instalación-y-ejecución-del-proyecto)
    1. [Ejecución en un servidor remoto](#ejecución-en-un-servidor-remoto)
    2. [Instalación local](#instalación-local)
3. [Créditos](#créditos)
4. [Licencias](#licencias)

## Descripción del proyecto

### Introducción

Con esta página se pretende concienciar sobre el uso responsable del coche y el cambio climático.

La página contiene distintas gráficas que muestran como la marca, el modelo, el tamaño del motor y los hábitos de conducción afectan en el consumo del vehículo. Además, también se presentan las emisiones producidas por los carburantes más usados.

Finalmente, hay una última sección que muestra la cantidad de kg de CO2 que emite una sola persona al hacer un viaje en un avión comercial.

### Tecnologías

#### FRONT END

- Lenguajes

    1. **HTML 5**: estructura de la página.
    2. **CSS**: estilos personalizados.
    3. **JavaScript**: interacción con el usuario y peticiones asíncronas al servidor y a la API empleada.

- Librerías

    1. **JQuery y Ajax**: utilizado para manipular el DOM y facilitar la petición asíncrona de datos.
    2. **Bootstrap 5.2.0**: empleado para dar estilos e interactividad a la página de forma sencilla.
    3. **Popper**: librería auxiliar de Bootstrap para 'dropdowns' y 'popover', entre otros.
    4. **Highcharts y Highmaps**: conjunto de librerías utilizadas para la creación y manipulación de los gráficos mostrados en la página.
    5. **AOS**: empleada para las animaciones al moverse por la página.

#### BACK END

1. **PHP**: peticiones a la base de datos.
2. **MySQL**: base de datos empleada.

### Origen de los datos

#### Base de datos local

Los datos referentes al consumo y emisiones de CO2 por vehículo se han extraido de un [dataset de Kaggle](https://www.kaggle.com/datasets/mohamedjafirashraf/fuel-consumption-co2).

Dicha información está cargada en la base de datos local llamada consumo, en las siguientes tablas:

- Consumption

    Esta tabla contiene la información referente al consumo y emisiones de diferentes vehículos, según su marca y modelo. La tabla esta organizada con los siguientes campos:

    1. **MODELYEAR**: año del modelo.
    2. **MAKE**: marca del vehículo.
    3. **MODEL**: modelo del vehículo.
    4. **VEHICLECLASS**: clase del vehículo.
    5. **ENGINESIZE**: tamaño del motor.
    6. **CYLINDERS**: número de cilindros.
    7. **TRANSMISSION**: tipo de transmisión.
    8. **FUELTYPE**: tipo de combustible.
    9. **FUELCONSUMPTION_CITY**: consumo en ciudad.
    10. **FUELCONSUMPTION_HWY**: consumo en carretera.
    11. **FUELCONSUMPTION_COMB**: consumo combinado en ciudad y carretera.
    12. **FUELCONSUMPTION_COMB_MPG**: consumo combinado en ciudad y carretera en millas por galón.
    13. **CO2EMISSIONS**: emisiones de CO2.

- Airports

    Esta tabla contiene información de todos los aeropuertos del mundo, referente a su identificación y ubicación

    1. **code**: código identificador del aeropuerto.
    2. **lat**: latitud del aeropuerto.
    3. **lon**: longitud del aeropuerto.
    4. **name**: nombre del aeropuerto.
    5. **city**: ciudad donde se encuentra el aeropuerto.
    6. **state**: estado donde se encuentra el aeropuerto.
    7. **country**: país donde se encuentra el aeropuerto.

#### API

Como API hemos elegido [climatiq.io](https://www.climatiq.io/docs#travel-flights), que nos permite ver las emisiones de CO2 de un viaje en avión entre dos aeropuertos.

## Instalación y ejecución del proyecto

Ofrecemos dos opciones a la hora de ejecutar el proyecto: ejecución en un servidor remoto e instalación local.

### Ejecución en un servidor remoto

Para ejecutar el proyecto en un servidor remoto basta con entrar en el siguiente enlace: <https://consucar.up.railway.app/>.
Una vez dentro de la página, se puede navegar por la misma con todas sus funcionalidades.

### Instalación local

1. Instalar servidor local
  
    Para ejecutar la práctica es necesario tener instalado un servidor local en el sistema. En nuestro caso, hemos utilizado [XAMPP](https://www.apachefriends.org/es/download.html), pero cualquier otro servidor local puede ser utilizado (WAMP, etc).

2. Clonar el proyecto en el servidor local

    Para clonar el proyecto en el servidor local, es necesario tener instalado [Git](https://git-scm.com/downloads) en el sistema.

    Una vez instalado, deberemos movernos a la carpeta destinada a alojar los proyectos del servidor local (por defecto, en XAMPP es la carpeta 'htdocs') y ejecutar el siguiente comando desde la terminal:

    ```bash
    git clone https://github.com/Trebla96/AppsDistribuidas.git
    ```

3. Copiar la base de datos en el servidor local

    Crear una base de datos llamada "consumo" y importar la base de datos a partir del archivo `consumo.sql` que se encuentra en la carpeta 'database' de la raíz del proyecto previamente clonado, llamada `AppsDistribuidas`.

4. Modificar la cabecera del archivo `consults.php`

    Se debe modificar el archivo `consults.php` ubicado en "assets/php", para que la conexión con la base de datos se realice correctamente. Deberá modificarse el valor de las variables `$hostName`, `$user`, `$pass` y `$dbName`, de acuerdo con los parámetros del servidor local.

    ```php

    <?php

    $hostName = 'hostname';      # Host name
    $user = 'username';          # Username of sql server
    $pass = 'password';          # Password of sql server
    $dbName = 'dbName';          # Name of database

    function consultDatabase($query)
    {
        ...

        $conn = mysqli_connect($hostName, $user, $pass, $dbName);
        
        ...
    }

    ```

    En nuestro caso, los valores utilizados son:

    ```php
    $hostName = 'localhost';    # Hostname of server
    $user = 'root';             # Username of sql server
    $pass = '';                 # Password of sql server
    $dbName = 'consumo';        # Name of database        
    ```

5. Arrancar el servidor local.

    Se debe arrancar el servidor web y el servidor de base de datos.

6. Acceder a la página.

    Una vez arrancado el servidor local, acceder a la página a través del siguiente enlace: <http://localhost/AppsDistribuidas/index.php>.

## Créditos

1. Cristian Comellas Fluxá
2. Albert Fajardo Marcus

## Licencias

Link al documento de licencias: [LICENSE](https://github.com/Trebla96/AppsDistribuidas/blob/main/LICENSE.md)
