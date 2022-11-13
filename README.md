# ConSuCar

ConSuCar es una aplicacion que permite consultar el consumo y emisiones de los automoiles.

## Tabla de contenidos

xxx

## Descripción del proyecto

### Introdicción

La pagina muestra diferentes estadisticas que hacen referencia al uso de automoviles de diferentes marcas y modelos, mostrando como dependiendo del tipo de combustible, modelo y tipo de conduccion afectan al consumo de combustible y emisiones de CO2.
Finalmente hay una ultima seccion que muestra la cantidad de kg de CO2 que emite una sola persona al hacer un viaje en avion comercial.
Con esta pagina se pretende concienciar sobre el uso responsable del coche y el cambio climatico.

### Tecnologias (FRONT-END (LENG- LIB))

#### FRONT-END

##### Librerias

1. JQuery y Ajax
2. Bootstrap 5.2.0
3. Popper
4. Highcharts y Highmaps
5. AOS

##### Lenguajes

1. HTML 5
2. CSS
3. JavaScript

#### BACK-END

1. PHP
2. MySQL

### Origen de los datos

#### Base de datos local

Los datos referentes al consumo y emisiones de CO2 por veiculo se han extraido de la siguinte base de datos: {LINK}
Las coordenadas de los aeropuertos y sus codigos IATA se han extraido de la siguinete base de datos: {LINK}

Ambos estan cargados en la base de datos local llamada consumo, en las siguientes tablas:

##### consumption

Esta tabla contiene la informacion referente al consumo y emisiones de diferentes vehiculos, segun su marca y modelo. La tabla esta organizada con los siguientes campos:

1. MODELYEAR
2. MAKE
3. MODEL
4. VEHICLECLASS
5. ENGINESIZE
6. CYLINDERS
7. TRANSMISSION
8. FUELTYPE
9. FUELCONSUMPTION_CITY
10. FUELCONSUMPTION_HWY
11. FUELCONSUMPTION_COMB_MPG
12. CO2EMISSIONS

##### airports

Esta tabla copntiene informacion de todos los aeropuertos del mundo, referentye a su identificación y ubicación

1. code
2. lat
3. lon
4. name
5. city
6. state
7. country

#### API

Como API hemos elegido climatiq, que nos permite ver las emisiones de CO2 de un viaje en avion entre dos aeropuertos

## Instalacion y ejecucion del proyecto

Para la instalacion y ejecucion del proyecto en un entorno local hay que conectar el proyecto a la base de datos 'consumo.sql', para el desarollo del proyecto se ha usado un servidor apache, mediante XAMPP. Para poder visualizar el proyecto hay que ejecutar el archivo index.php.

XAMPP: <https://www.apachefriends.org/es/download.html>

Tambien hemos usado un servidor remoto para poder visualizar el proyecto en la web, para ello hemos usado el servicio de hosting de railway, que nos permite alojar paginas web gratuitamente.

Link: <https://consucar.up.railway.app/>

## Créditos

1. Cristian Comellas Fluixa
2. Albert Fajardo Marcus

## Licencias

xx
