export default function loadAirportCoordinatesData(iataCodeOr, iataCodeDest, callback) {
    $.get(`assets/php/airportCoordinates.php?iata1=${iataCodeOr}&iata2=${iataCodeDest}`, (data) => {
        data = JSON.parse(data);
        callback(data, iataCodeOr, iataCodeDest);
    })
}