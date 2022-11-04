export default async function getCO2Travel(origin, destination, passengers, travelClass) {

    //  POST method:
    const url = "https://beta3.api.climatiq.io/travel/flights"
    const data = {
        "legs": [
            {
                "from": origin,
                "to": destination,
                "passengers": passengers,
                "class": travelClass
            }
        ]
    }

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ZF48XE9A804AKEHC7FFVDPT9VXX9'
        },
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    })
    const jsonResponse = await response.json()
    return jsonResponse

}