export default function loadConsumptionMakeData(callback) {

    $.get("assets/php/consumptionMake.php", (data) => {
        data = JSON.parse(data);
        data.sort(
            (a, b) => {
                return b['AVERAGE_CONSUMPTION'] - a['AVERAGE_CONSUMPTION'];
            }
        )
        data = data.slice(0, 20);
        callback(data)
    })
}