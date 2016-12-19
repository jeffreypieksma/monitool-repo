 //var chartData = generateChartData();

// console.log(chartData);
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
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
    "graphs": [{
        "id": "g1",
        "type": "smoothedLine",
        "hideBulletsCount": 50,
        "title": "red line",
        "valueField": "visits",
        "useLineColorForBulletBorder": false,
        "balloon":{
            "drop":true
        }
    }],
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


var overallDoughnutChart = document.getElementById("OverallDoughnutChart");

console.log(overallDoughnutChart);
var newDoughnutChart = new Chart(overallDoughnutChart, {
    type: 'doughnut',
    data: {
        labels: [
            "Facebook",
            "Youtube"
        ],
        datasets: [{
            data: [300, 50],
            backgroundColor: [
                "#36A2EB",
                "#FF6384"                
            ],
            hoverBackgroundColor: [
                "#36A2EB",
                "#FF6384"
            ]
        }]},
    animation:{
        animateScale:true
    }
    options: {
        scales: {
            width: 500, // the same as right - left
            height: 100 // the same as bottom - top
        }
    }
   

});
