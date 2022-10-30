export default function loadConsumptionEngineSizeData(callback) {
    $.get("assets/php/consumptionEngineSize.php", (data) => {
        data = JSON.parse(data);
        callback(data)
    })
}