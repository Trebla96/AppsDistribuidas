import getCO2Travel from "./modules/apicall.js";
import loadAirportoordinatesData from "./modules/airportCoordinates.js";
import topology from './maps/worldmap.js'

// ================= Auxiliar functions =============================

const getGraticule = () => {
    const data = [];

    // Meridians
    for (let x = -180; x <= 180; x += 15) {
        data.push({
            geometry: {
                type: 'LineString',
                coordinates: x % 90 === 0 ? [
                    [x, -90],
                    [x, 0],
                    [x, 90]
                ] : [
                    [x, -80],
                    [x, 80]
                ]
            }
        });
    }

    // Latitudes
    for (let y = -90; y <= 90; y += 10) {
        const coordinates = [];
        for (let x = -180; x <= 180; x += 5) {
            coordinates.push([x, y]);
        }
        data.push({
            geometry: {
                type: 'LineString',
                coordinates
            },
            lineWidth: y === 0 ? 2 : undefined
        });
    }

    return data;
};

// Add flight route after initial animation
let afterAnimate = e => {
    const chart = e.target.chart;

    if (!chart.get('flight-route')) {
        chart.addSeries({
            type: 'mapline',
            name: 'Flight route, Amsterdam - Los Angeles',
            animation: false,
            id: 'flight-route',
            data: [{
                geometry: {
                    type: 'LineString',
                    coordinates: [
                        [4.90, 53.38], // Amsterdam
                        [-118.24, 34.05] // Los Angeles
                    ]
                },
                color: '#313f77'
            }],
            lineWidth: 2,
            accessibility: {
                exposeAsGroupOnly: true
            }
        }, false);
        chart.addSeries({
            type: 'mappoint',
            animation: false,
            id: 'flight-points',
            data: [{
                name: 'Amsterdam',
                geometry: {
                    type: 'Point',
                    coordinates: [4.90, 53.38]
                }
            }, {
                name: 'LA',
                geometry: {
                    type: 'Point',
                    coordinates: [-118.24, 34.05]
                }
            }],
            color: '#313f77',
            accessibility: {
                enabled: false
            }
        }, false);
        chart.redraw(false);
    }
};

// ================== World Map =============================

export const worldMap = Highcharts.mapChart('flight-emissions', {
    chart: {
        map: topology
    },
    title: {
        text: 'Flight consumption',
        floating: true,
        align: 'left'
    },

    subtitle: {
        text: 'Source: <a href="https://www.climatiq.io/docs#travel-flights">climatiq.io</a><br>' +
            'Click and drag to rotate globe<br>',
        floating: true,
        y: 34,
        align: 'left'
    },

    legend: {
        enabled: false
    },

    mapNavigation: {
        enabled: true,
        enableDoubleClickZoomTo: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    mapView: {
        maxZoom: 30,
        projection: {
            name: 'Orthographic',
            rotation: [60, -30]
        }
    },

    colorAxis: {
        tickPixelInterval: 100,
        minColor: '#BFCFAD',
        maxColor: '#31784B',
        max: 1000
    },

    tooltip: {
        pointFormat: '{point.name}: {point.value}'
    },

    plotOptions: {
        series: {
            animation: {
                duration: 750
            },
            clip: false
        }
    },

    series: [{
        name: 'Graticule',
        id: 'graticule',
        type: 'mapline',
        data: getGraticule(),
        nullColor: 'rgba(0, 0, 0, 0.05)',
        accessibility: {
            enabled: false
        },
        enableMouseTracking: false
    }, {
        events: {
            afterAnimate
        },
    }]
});

// Render a circle filled with a radial gradient behind the globe to
// make it appear as the sea around the continents
const renderSea = () => {
    let verb = 'animate';

    if (!worldMap.sea) {
        worldMap.sea = worldMap.renderer
            .circle()
            .attr({
                fill: {
                    radialGradient: {
                        cx: 0.4,
                        cy: 0.4,
                        r: 1
                    },
                    stops: [
                        [0, 'white'],
                        [1, 'lightblue'] //lightblue
                    ]
                },
                zIndex: -1
            })
            .add(worldMap.get('graticule').group);
        verb = 'attr';
    }

    const bounds = worldMap.get('graticule').bounds,
        p1 = worldMap.mapView.projectedUnitsToPixels({
            x: bounds.x1,
            y: bounds.y1
        }),
        p2 = worldMap.mapView.projectedUnitsToPixels({
            x: bounds.x2,
            y: bounds.y2
        });
    worldMap.sea[verb]({
        cx: (p1.x + p2.x) / 2,
        cy: (p1.y + p2.y) / 2,
        r: Math.min(p2.x - p1.x, p1.y - p2.y) / 2
    });
};

renderSea();
Highcharts.addEvent(worldMap, 'redraw', renderSea);

// ================== Update world Map =============================

function updateWorldMap(params, originIata, destinationIata) {

    // Get the coordinates of the airports from the database
    const originDataRaw = params.filter((item) => item.code === originIata);
    const destinationDataRaw = params.filter((item) => item.code === destinationIata);
    const fAux = (item) => {
        return {
            city: item.city,
            lat: Number(item.lat),
            long: Number(item.lon)
        }
    }
    const originData = originDataRaw.map(fAux)[0];
    const destinationData = destinationDataRaw.map(fAux)[0];

    const ob = {
        data: [{
            geometry: {
                type: 'LineString',
                coordinates: [
                    [originData.long, originData.lat], // Amsterdam
                    [destinationData.long, destinationData.lat] // Los Angeles
                ]
            },
            color: '#313f77'
        }]
    }

    const ob2 = {
        data: [{
            name: originData.city,
            geometry: {
                type: 'Point',
                coordinates: [originData.long, originData.lat]
            }
        }, {
            name: destinationData.city,
            geometry: {
                type: 'Point',
                coordinates: [destinationData.long, destinationData.lat]
            }
        }]
    }

    worldMap.get('flight-route').update(ob, false);
    worldMap.get('flight-points').update(ob2, false);

    worldMap.redraw(false);
}


// add event listener on button id = flight-emissions-button to capture the data of the form
$("#flight-emissions-button").on("click", function () {


    // get the data from the form with jQuery
    const origin = $("#flight-origin")
    const destination = $("#flight-destination")
    const originValue = origin.val();
    const destinationValue = destination.val();

    let error = false;

    if (originValue.length !== 3 || !iataOptions.includes(originValue)) {
        error = true;
        origin.addClass("is-invalid");
    } else {
        origin.removeClass("is-invalid");
    }

    if (destinationValue.length !== 3 || !iataOptions.includes(destinationValue)) {
        error = true;
        destination.addClass("is-invalid");
    } else {
        destination.removeClass("is-invalid");
    }

    if (error) {
        return;
    }

    loadAirportoordinatesData(originValue, destinationValue, updateWorldMap);

    // clean the form with jQuery
    origin.val("");
    origin.removeClass("is-invalid");
    origin.removeClass("is-valid");

    destination.val("");
    destination.removeClass("is-invalid");
    destination.removeClass("is-valid");

});

const iataOptions = [...$('#datalistOptionsFlight').prop('options')].map((option) => option.value);

$("[data-input-iata]").on("input", (e) => {


    // get the data from the form with jQuery
    var value = e.target.value;


    if (value.length !== 3 || !iataOptions.includes(value)) {
        e.target.classList.remove("is-valid");
        return;
    }

    e.target.classList.remove("is-invalid");
    e.target.classList.add("is-valid");

});

// ================== API call =============================

// getCO2Travel("PMI", "BCN", 2, "first")
//     .then(data => {
//         console.log(data.co2e);
//     })


