document.addEventListener('DOMContentLoaded', loadGraphics);



function loadGraphics() {

    loadEmissionFuelTypeGraphic();


}


function loadEmissionFuelTypeGraphic() {

    types = {
        'D': 'Diesel',
        'E': 'Gasolina',
        'Z': 'Gasolina +',
        'X': 'Gas natural'
    }

    $.get("assets/php/emissionFuelType.php", (data) => {
        data = JSON.parse(data);
        console.log(data)
        my_data = data.map((item) => item.media);
        my_labels = data.map((item) => types[item.FUELTYPE]);

        console.log(my_data, my_labels);

        const chart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Fuel Consumption'
            },
            xAxis: {
                categories: my_labels
            },
            yAxis: {
                title: {
                    text: 'Fuel'
                }
            },
            series: [{
                name: 'Fuel',
                data: my_data
            }
            ]

        });



    })



}