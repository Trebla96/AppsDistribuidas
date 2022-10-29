export default function loadEmissionFuelTypeGraphic() {

    const types = {
        'D': 'Diesel',
        'E': 'Gasolina +',
        'Z': 'Gasolina',
        'X': 'Gas natural'
    }

    $.get("assets/php/emissionFuelType.php", (data) => {
        data = JSON.parse(data);
        const my_data = data.map((item) => Number(item.AVERAGE_EMISSIONS));
        const my_labels = data.map((item) => types[item.FUELTYPE]);

        const chart = Highcharts.chart('emission-by-fueltype', {
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