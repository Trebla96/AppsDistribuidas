import loadEmissionFuelTypeData from "./modules/emissionFuelType.js";
import loadConsumptionModelMakeData from "./modules/consumptionModelMark.js";
import loadConsumptionEngineSizeData from "./modules/consumptionEngineSize.js";
import { lightTheme, darkTheme } from "./themes.js";
import getCO2Travel from "./modules/apicall.js";

// Enable tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// ========================== Fuel emissions graphic code ====================================
const emissionsFuelGraphic = Highcharts.chart('emission-by-fueltype', {
    chart: {
        type: 'pie',

    },
    title: {
        text: ''
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.percentage:.1f}%'
            },
            showInLegend: true
        }
    },
    series: [
        {
            name: 'Fuel',
            data: []
        }
    ]


});

const types = {
    'D': 'Gasoline +',
    'E': 'Gasoline',
    'Z': 'GLP',
    'X': 'Diesel'
}

function updateEmissionsFuelGraphic(data) {
    const my_data = data.map((item) => {
        return {
            name: types[item.FUELTYPE],
            y: Number(item.AVERAGE_EMISSIONS)
        }
    }
    );

    emissionsFuelGraphic.series[0].setData(my_data);

}

loadEmissionFuelTypeData(updateEmissionsFuelGraphic);

// ================= Consumption by model and brand graphic code =============================

const consumptionModelMakeGraphic = Highcharts.chart('model-consumption-by-make', {
    chart: {
        type: 'bar'
    },
    xAxis: {
        categories: []
    },
    title: {
        text: 'Average consumption by Model of '
    },
    yAxis: {
        title: {
            text: 'Average Consumption (L/100km)'
        }
    },
    series: [
        {
            name: 'Fuel',
            data: []
        }
    ],
    plotOptions: {
        series: {
            events: {
                legendItemClick: function () {
                    return false;
                }
            }
        }
    }
});

function updateConsumptionModelMakeGraphic(data, make) {
    const my_data = data.map((item) => Number(item.AVERAGE_CONSUMPTION));
    const my_labels = data.map((item) => item.MODEL);

    consumptionModelMakeGraphic.series[0].setData(my_data);
    consumptionModelMakeGraphic.xAxis[0].setCategories(my_labels);
    consumptionModelMakeGraphic.setTitle({ text: `Average consumption by Model of ${make}` });
}

$("#make-input-form").submit((e) => { e.preventDefault(); });


const makeInput = $('#make-input');
const options = [...$('#datalistOptionsBrand').prop('options')].map((option) => option.value);
let actualMake = "";

// add event listener to input the input to update the graphic when the user 
// selects a new brand
makeInput.change((e) => {

    const brandName = e.target.value.toUpperCase();

    // verify if the brand name is not in the list we exit the function because
    // we should not search for it in the BD, since it is not there
    if (!options.includes(brandName)) return;

    // if the brand name is the same as the previous one we exit the function
    // because we do not need to search for it in the BD again
    if (brandName === actualMake) return;

    // Update the graphic with the new data
    loadConsumptionModelMakeData(brandName, updateConsumptionModelMakeGraphic);
    actualMake = brandName;

    // Clean form
    makeInput.val('');

});

loadConsumptionModelMakeData(options[0], updateConsumptionModelMakeGraphic);


// ================= Consumption in hwy and city by engine size ============================= 

const consumptionEngineSizeGraphic = Highcharts.chart('consumption-by-enginesize', {
    chart: {
        type: 'line'
    },
    xAxis: {
        title: {
            text: 'Engine Size (L)'
        },
        categories: []
    },
    title: {
        text: ''
    },
    yAxis: {
        title: {
            text: 'Average Consumption (L/100km)'
        }
    },
    series: [
        {
            name: 'Highway',
            data: []
        },
        {
            name: 'City',
            data: []
        }
    ],
    plotOptions: {
        series: {
            events: {
                legendItemClick: function (event) {
                    return this.chart.series.some(s =>
                        this === s ? !s.visible : s.visible);
                }
            }
        }
    }
});

function updateConsumptionEngineSizeGraphic(data) {
    const myDataCity = data.map((item) => Number(item.AVERAGE_CONSUMPTION_CITY));
    const myDataHWY = data.map((item) => Number(item.AVERAGE_CONSUMPTION_HWY));

    consumptionEngineSizeGraphic.series[0].setData(myDataHWY);
    consumptionEngineSizeGraphic.series[1].setData(myDataCity);

}

loadConsumptionEngineSizeData(updateConsumptionEngineSizeGraphic);

// ================= Flys World Map =============================

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
const afterAnimate = e => {
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

import topology from './maps/worldmap.js'

const worldMap = Highcharts.mapChart('flight-emissions', {
    chart: {
        map: topology
    },
    title: {
        text: 'Airport density per country',
        floating: true,
        align: 'left',
        style: {
            textOutline: '2px white'
        }
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
        /* data, */
        joinBy: 'name',
        name: 'Airports per million km²',
        states: {
            hover: {
                color: '#a4edba',
                borderColor: '#333333'
            }
        },
        dataLabels: {
            enabled: false,
            format: '{point.name}'
        },
        events: {
            afterAnimate
        },
        accessibility: {
            exposeAsGroupOnly: true
        }
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
                        [1, 'lightblue']
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

// update world map flight data




// Delete highcharts credits
$('.highcharts-credits').remove();



// ================= Switch light mode ============================= 
const graphics = [emissionsFuelGraphic, consumptionModelMakeGraphic, consumptionEngineSizeGraphic, worldMap];
const sunSVG = $('#svg-sun');
const moonSVG = $('#svg-moon');
export function toggleGraphicsLightMode() {
    const lightMode = localStorage.getItem('lightSwitch');
    const options = {
        'dark': {
            theme: darkTheme,
            moonSVGHidden: true,
            sunSVGHidden: false
        },
        'light': {
            theme: lightTheme,
            moonSVGHidden: false,
            sunSVGHidden: true
        }
    }

    const theme = options[lightMode].theme
    graphics.forEach((graphic) => {
        graphic.update(theme);
    });



    sunSVG.attr('hidden', options[lightMode].sunSVGHidden ? true : null)
    moonSVG.attr('hidden', options[lightMode].moonSVGHidden ? true : null)


}




/**
 * Back to top button
 */
let backtotop = document.querySelector('.back-to-top')
if (backtotop) {
    const toggleBacktotop = () => {
        if (window.scrollY < 50) {
            backtotop.classList.add('opacity-0')
            backtotop.classList.add('pe-none')
        } else {
            backtotop.classList.remove('opacity-0')
            backtotop.classList.remove('pe-none')
        }
    }
    window.addEventListener('load', toggleBacktotop)
    document.addEventListener('scroll', toggleBacktotop)
}

// getCO2Travel("PMI", "BCN", 2, "first")
//     .then(data => {
//         console.log(data.co2e);
//     })

