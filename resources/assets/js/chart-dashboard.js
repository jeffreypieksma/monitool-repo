 //var chartData = generateChartData();

console.log(chartData);
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "categoryField": "category",
    "color": "#045071",
    "fontFamily": "RalewayRegular",
    "fontSize": 12,
    "marginRight": 0,
    "autoMarginOffset": 15,
    "marginTop": 0,
    "dataProvider": chartData,
    "valueAxes": [{
        "axisAlpha": 0.2,
        "dashLength": 1,
        "position": "left"
    }],
    "mouseWheelZoomEnabled": false,
    "graphs": [
    {
        "id": "insights",
        "type": "smoothedLine",
        "hideBulletsCount": 50,
        "title": "red line",
        "valueField": "visits",
        "useLineColorForBulletBorder": true,
        "balloon":{
            "drop":true
        }
    },
    {
        "id": "likes",
        "type": "smoothedLine",
        "hideBulletsCount": 50,
        "title": "red line",
        "valueField": "likes",
        "useLineColorForBulletBorder": true,
        "connect": false,
        "balloon":{
            "drop":true
        }
    }
    ],
    "chartScrollbar": {
        "autoGridCount": true,
        "graph": "g1",
        "backgroundColor": "#62ABCB",
        "graphFillColor": "#1D7FAA",
        "selectedBackgroundColor": "#62ABCB",
        "selectedGraphFillColor": "#045071",
        "scrollbarHeight": 40
    },
    "chartCursor": {
       "limitToGraph":"g1",
       "cursorAlpha": .1
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "axisColor": "#045071",
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    }
});

chart.addListener("rendered", zoomChart);
zoomChart();

// this method is called when chart is first inited as we listen for "rendered" event
function zoomChart() {
    // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
    chart.zoomToIndexes(chartData.length - 40, chartData.length - 1);
}


// // generate some random data, quite different range
// function generateChartData() {
//     var chartData = [];
//     var firstDate = new Date();
//     firstDate.setDate(firstDate.getDate() - 5);

//     for (var i = 0; i < 100; i++) {
//         // we create date objects here. In your data, you can have date strings
//         // and then set format of your dates using chart.dataDateFormat property,
//         // however when possible, use date objects, as this will speed up chart rendering.
//         var newDate = new Date(firstDate);
//         newDate.setDate(newDate.getDate() + i);

//         var visits = Math.round(Math.random() * (40 + i / 5)) + 20 + i;

//         chartData.push({
//             date: newDate,
//             visits: visits
           
//         });
//     }
//     return chartData;
// }


//--------------------------------chartjs----------------------------------------// 

// var ctx = document.getElementById("myChart");
// var myChart = new Chart(ctx, {
//   type: 'line',
//   data: {
//       labels: [12, 13, 24, 53, 13, 24, 53],
//       datasets: [
//       {
//           label: 'Youtube views',
//           fill: false,
//           data: [12, 43, 32, 2, 43, 32, 2],
//           backgroundColor: [
//               'rgba(255, 99, 132, 0.2)',
//           ],
//           borderColor: [
//               'rgba(255,99,132,1)',
//           ],
//           borderWidth: 1
//       },
//       {
//           label: 'Facebook views',
//           fill: false,
//           data: [43, 34, 12, 56, 34, 12, 56],
//           backgroundColor: [
//               'rgba(99,132,255, 0.2)',
//           ],
//           borderColor: [
//               'rgb(99,132,255)',
//           ],
//           borderWidth: 1
//       }
//       ]
//   },
//   options: {
//     responsive: true,
//     maintainAspectRatio: false,
//     legend: {
//           display: true,
//           position: 'top'
//       },
//     scales: {
//         yAxes: [{
//             ticks: {
//                 beginAtZero:true
//             }
//         }]
//     }
//   }
// });