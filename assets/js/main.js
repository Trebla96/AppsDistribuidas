document.addEventListener('DOMContentLoaded', function () {
    const chart = Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});

// let chart; // globally available
// let usdtoeur = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// document.addEventListener('DOMContentLoaded', function () {
//     chart = Highcharts.stockChart('container', {
//         rangeSelector: {
//             selected: 1
//         },
//         series: [{
//             name: 'USD to EUR',
//             data: usdtoeur // predefined JavaScript array
//         }]
//     });
// });