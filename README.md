# ConSuCar

ConSuCar es una aplicación que permite consultar el consumo y emisiones de algunos vehículos, marcas e incluso de vuelos.

## Tabla de contenidos

xxx

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

-  Librerías

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

    Esta tabla contiene la informacion referente al consumo y emisiones de diferentes vehiculos, segun su marca y modelo. La tabla esta organizada con los siguientes campos:

    1. **MODELYEAR**: año del modelo.
    2. **MAKE**: marca del vehiculo.
    3. **MODEL**: modelo del vehiculo.
    4. **VEHICLECLASS**: clase del vehiculo.
    5. **ENGINESIZE**: tamaño del motor.
    6. **CYLINDERS**: numero de cilindros.
    7. **TRANSMISSION**: tipo de transmisión.
    8. **FUELTYPE**: tipo de combustible.
    9. **FUELCONSUMPTION_CITY**: consumo en ciudad.
    10. **FUELCONSUMPTION_HWY**: consumo en carretera.
    11. **FUELCONSUMPTION_COMB**: consumo combinado en ciudad y carretera.
    12. **FUELCONSUMPTION_COMB_MPG**: consumo combinado en ciudad y carretera en millas por galón.
    13. **CO2EMISSIONS**: emisiones de CO2.

- Airports

    Esta tabla copntiene informacion de todos los aeropuertos del mundo, referente a su identificación y ubicación

    1. **code**: código identificador del aeropuerto.
    2. **lat**: latitud del aeropuerto.
    3. **lon**: longitud del aeropuerto.
    4. **name**: nombre del aeropuerto.
    5. **city**: ciudad donde se encuentra el aeropuerto.
    6. **state**: estado donde se encuentra el aeropuerto.
    7. **country**: pais donde se encuentra el aeropuerto.

#### API

Como API hemos elegido [climatiq.io](https://www.climatiq.io/docs#travel-flights), que nos permite ver las emisiones de CO2 de un viaje en avión entre dos aeropuertos.

## Instalación y ejecución del proyecto
Ofrecemos 


Para ejecutar el proyecto es necesario tener instalado un servidor web, como por ejemplo Apache, y un servidor de base de datos, como MySQL.


Para la instalacion y ejecucion del proyecto en un entorno local hay que conectar el proyecto a la base de datos 'consumo.sql', para el desarollo del proyecto se ha usado un servidor apache, mediante XAMPP. Para poder visualizar el proyecto hay que ejecutar el archivo index.php.

```bash

```

XAMPP: <https://www.apachefriends.org/es/download.html>

Tambien hemos usado un servidor remoto para poder visualizar el proyecto en la web, para ello hemos usado el servicio de hosting de railway, que nos permite alojar paginas web gratuitamente.

Link: <https://consucar.up.railway.app/>

## Créditos

1. Cristian Comellas Fluxá
2. Albert Fajardo Marcus

## Licencias

xx
