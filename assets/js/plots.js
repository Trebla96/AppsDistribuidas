import loadEmissionFuelTypeData from "./modules/emissionFuelType.js";
import loadConsumptionModelMakeData from "./modules/consumptionModelMark.js";
import loadConsumptionEngineSizeData from "./modules/consumptionEngineSize.js";


// ========================== Fuel emissions graphic code ====================================
export const emissionsFuelGraphic = Highcharts.chart('emission-by-fueltype', {
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

export const consumptionModelMakeGraphic = Highcharts.chart('model-consumption-by-make', {
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

makeInput.on('input', (e) => {
    const make = e.target.value;
    if (make.length < 3 || !options.includes(make)) {
        e.target.classList.remove("is-valid");
        return;
    }

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

    // if the brand name is the same as the previous one we exit the function
    // because we do not need to search for it in the BD again
    if (brandName === actualMake) return;

    // Update the graphic with the new data
    loadConsumptionModelMakeData(brandName, updateConsumptionModelMakeGraphic);
    actualMake = brandName;


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