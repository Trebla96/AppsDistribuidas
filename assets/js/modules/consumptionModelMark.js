export default function loadConsumptionModelMarkGraphic() {

    const types = {
        'D': 'Diesel',
        'E': 'Gasolina',
        'Z': 'Gasolina +',
        'X': 'Gas natural'
    }

    $.post("assets/php/consumptionModelMark.php",

        {
            'make': 'BMW',
        },

        (data) => {
            console.log(data)
            data.sort(
                (a, b) => {
                    return a['AVERAGE_CONSUMPTION'] - b['AVERAGE_CONSUMPTION'];
                }
            )
            data = data.slice(0, 5);
            const my_data = data.map((item) => Number(item.AVERAGE_CONSUMPTION));
            const my_labels = data.map((item) => item.MODEL);

            const chart = Highcharts.chart('model-consumption-by-make', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Consumption by model (BMW)'
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



        }, 'json')



}