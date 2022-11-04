export default function loadConsumptionModelMarkData(make, callback) {

    const types = {
        'D': 'Diesel',
        'E': 'Gasolina',
        'Z': 'Gasolina +',
        'X': 'Gas natural'
    }

    $.post("assets/php/consumptionModelMark.php",

        {
            'make': make,
        },

        (data) => {
            data.sort(
                (a, b) => {
                    return a['AVERAGE_CONSUMPTION'] - b['AVERAGE_CONSUMPTION'];
                }
            )
            data = data.slice(0, 5);

            callback(data, make);

        }, 'json')
}
