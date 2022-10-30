export default function loadEmissionFuelTypeData(callback) {
    $.get("assets/php/emissionFuelType.php", (data) => {
        data = JSON.parse(data);
        callback(data)
    })
}