import loadEmissionFuelTypeGraphic from "./modules/emissionFuelType.js";
import loadConsumptionModelMakeData from "./modules/consumptionModelMark.js";

// ========================== Fuel emissions graphic code ====================================
const emissionsFuelGraphic = Highcharts.chart('emission-by-fueltype', {
    chart: {
        type: 'bar'
    },
    xAxis: {
        categories: []
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

const types = {
    'D': 'Diesel',
    'E': 'Gasolina +',
    'Z': 'Gasolina',
    'X': 'Gas natural'
}

function updateEmissionsFuelGraphic(data) {
    const my_data = data.map((item) => Number(item.AVERAGE_EMISSIONS));
    const my_labels = data.map((item) => types[item.FUELTYPE]);

    emissionsFuelGraphic.series[0].setData(my_data);
    emissionsFuelGraphic.xAxis[0].setCategories(my_labels);
    emissionsFuelGraphic.setTitle({ text: '' });

}

loadEmissionFuelTypeGraphic(updateEmissionsFuelGraphic);

// ================= Consumption by model and brand graphic code =============================

const consumptionModelMakeGraphic = Highcharts.chart('model-consumption-by-make', {
    chart: {
        type: 'bar'
    },
    xAxis: {
        categories: []
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
    consumptionModelMakeGraphic.setTitle({ text: `Consumption by model (${make})` });

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


// ================= Consumption by model and brand graphic code =============================