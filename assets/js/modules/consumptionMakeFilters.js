export default function loadConsumptionMakeFiltersData(callback, filter) {

    filter = filter ?? "";

    $.post("assets/php/consumptionMakeFilters.php",
        {
            'filter': filter,
        }, (data) => {
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