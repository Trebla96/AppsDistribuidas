import loadEmissionFuelTypeData from "./modules/emissionFuelType.js";
import loadConsumptionModelMakeData from "./modules/consumptionModelMark.js";
import loadConsumptionEngineSizeData from "./modules/consumptionEngineSize.js";
import loadConsumptionMakeData from "./modules/consumptionMake.js";

// ========================== Consumption by mark filters ====================================
export const consumptionMakeGraphic = Highcharts.chart('consumption-by-make', {
    chart: {
        type: 'bar'
    },
    xAxis: {
        type: 'category',
        title: {
            text: null
        },
        min: 0,
        max: 4,
        scrollbar: {
            enabled: true
        },
        tickLength: 0
    },
    title: {
        text: 'Average consumption by Maker'
    },
    yAxis: {
        min: 0,
        max: 50,
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
            },
        },
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    }
});

function updateconsumptionMakeGraphic(data) {
    const my_data = data.map((item) => Math.round(Number(item.AVERAGE_CONSUMPTION) * 100) / 100);
    const my_labels = data.map((item) => item.MAKE);

    consumptionMakeGraphic.yAxis[0].setExtremes(0, Math.max(...my_data) * 1.1);
    consumptionMakeGraphic.series[0].setData(my_data);
    consumptionMakeGraphic.xAxis[0].setCategories(my_labels);


}

loadConsumptionMakeData(updateconsumptionMakeGraphic);

// ========================== Fuel emissions graphic code ====================================
export const emissionsFuelGraphic =
    Highcharts.chart("emission-by-fueltype", {
        chart: {
            type: "bubble"
        },

        title: {
            text: "Emissions by fuel type"
        },

        legend: {
            enabled: false
        },

        accessibility: {
            point: {
                valueDescriptionFormat:
                    "{index}. {point.name}, Emissions: {point.z} g/km."
            }
        },

        xAxis: {
            lineWidth: 0,
            minorGridLineWidth: 0,
            labels: {
                enabled: false
            },
            minorTickLength: 0,
            tickLength: 0
        },

        yAxis: {
            title: {
                text: ""
            },
            labels: {
                enabled: false
            },
            gridLineWidth: 0,
            accessibility: {
                rangeDescription: "Range: 200kg to 300kg."
            }
        },

        tooltip: {
            useHTML: true,
            headerFormat: "<table>",
            pointFormat:
                '<tr><th colspan="2"><h3>{point.name}</h3></th></tr>' +
                "<tr><th>Emissions:</th><td>{point.z} (g/km)</td></tr>",
            footerFormat: "</table>",
            followPointer: true,
            shared: true
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: "{point.name}",
                }
            },
            bubble: {
                minSize: 60,
                maxSize: 100,
            }
        },

        series: [
            {},
            {},
            {},
            {}
        ]
    });

const fuelTypes = {
    'D': 'Gasoline +',
    'E': 'Gasoline',
    'Z': 'GLP',
    'X': 'Diesel'
}

function updateEmissionsFuelGraphic(data) {

    let multiplier = 1.25;
    const myData = data.map((item, idx) => {
        const roundedEmissions = Math.round(item.AVERAGE_EMISSIONS * 100) / 100;
        multiplier *= -1.25;
        return {
            data: [
                { x: idx, y: 2 * multiplier, z: roundedEmissions, name: fuelTypes[item.FUELTYPE] }
            ]
        }
    }
    );


    emissionsFuelGraphic.update({
        series: myData
    });


}

loadEmissionFuelTypeData(updateEmissionsFuelGraphic);

// ================= Consumption by model and brand graphic code =============================

export const consumptionModelMakeGraphic = Highcharts.chart('model-consumption-by-make', {
    chart: {
        type: 'column'
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
        },
        column: {
            dataLabels: {
                enabled: true
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

makeInput.on('input', (e) => {
    const make = e.target.value.toUpperCase().toUpperCase();
    if (make.length < 3 || !options.includes(make)) {
        e.target.classList.remove("is-valid");
        return;
    }
    e.target.classList.remove("is-invalid");
    e.target.classList.add("is-valid");
});

makeInput.change((e) => {

    const brandName = e.target.value.toUpperCase();

    // verify if the brand name is not in the list we exit the function because
    // we should not search for it in the BD, since it is not there
    if (!options.includes(brandName)) {
        e.target.classList.add("is-invalid");
        return;
    }

    // if the brand name is the same as the previous one we do not need to search
    // for it in the BD again
    if (brandName !== actualMake) {
        // Update the graphic with the new data
        loadConsumptionModelMakeData(brandName, updateConsumptionModelMakeGraphic);
        actualMake = brandName;
    };

    // Clean form
    makeInput.val('');
    e.target.classList.remove("is-valid");
    e.target.classList.remove("is-invalid");

});

loadConsumptionModelMakeData(options[0], updateConsumptionModelMakeGraphic);


// ================= Consumption in hwy and city by engine size ============================= 

export const consumptionEngineSizeGraphic = Highcharts.chart('consumption-by-enginesize', {
    chart: {
        type: 'line'
    },
    xAxis: {
        title: {
            text: 'Engine Size (L)'
        },
        categories: []
    },
    legend: {
        symbolWidth: 60
    },
    title: {
        text: 'Consumption in highway and city by engine size'
    },
    yAxis: {
        title: {
            text: 'Average Consumption (L/100km)'
        }
    },
    series: [
        {
            name: 'Highway',
            data: [],
            dashStyle: 'longdash'
        },
        {
            name: 'City',
            data: [],
            dashStyle: 'shortdot'
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