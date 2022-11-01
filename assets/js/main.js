import loadEmissionFuelTypeData from "./modules/emissionFuelType.js";
import loadConsumptionModelMakeData from "./modules/consumptionModelMark.js";
import loadConsumptionEngineSizeData from "./modules/consumptionEngineSize.js";
import { lightTheme, darkTheme } from "./themes.js";

// ========================== Fuel emissions graphic code ====================================
const emissionsFuelGraphic = Highcharts.chart('emission-by-fueltype', {
    chart: {
        type: 'pie'
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
    'D': 'Diesel',
    'E': 'Gasoline +',
    'Z': 'Gasoline',
    'X': 'Natural gas'
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
        text: ''
    },
    yAxis: {
        title: {
            text: 'Fuel'
        }
    },
    series: [
        {
            name: 'Fuel',
            data: []
        }
    ]


});

function updateConsumptionModelMakeGraphic(data, make) {
    const my_data = data.map((item) => Number(item.AVERAGE_CONSUMPTION));
    const my_labels = data.map((item) => item.MODEL);

    consumptionModelMakeGraphic.series[0].setData(my_data);
    consumptionModelMakeGraphic.xAxis[0].setCategories(my_labels);

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
        categories: []
    },
    title: {
        text: ''
    },
    yAxis: {
        title: {
            text: 'Fuel'
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
    ]
});

function updateConsumptionEngineSizeGraphic(data) {
    const myDataCity = data.map((item) => Number(item.AVERAGE_CONSUMPTION_CITY));
    const myDataHWY = data.map((item) => Number(item.AVERAGE_CONSUMPTION_HWY));

    consumptionEngineSizeGraphic.series[0].setData(myDataHWY);
    consumptionEngineSizeGraphic.series[1].setData(myDataCity);
    consumptionEngineSizeGraphic.setTitle({ text: '' });

}

loadConsumptionEngineSizeData(updateConsumptionEngineSizeGraphic);



// Delete highcharts credits
$('.highcharts-credits').remove();



// ================= Switch light mode ============================= 
const graphics = [emissionsFuelGraphic, consumptionModelMakeGraphic, consumptionEngineSizeGraphic];
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