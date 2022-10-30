export default function loadEmissionFuelTypeGraphic(callback) {
    $.get("assets/php/emissionFuelType.php", (data) => {
        data = JSON.parse(data);
        callback(data)
    })
}