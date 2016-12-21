function dashboardMakeChart(chartData){
   var chart = AmCharts.makeChart("chartdiv", {
       "type": "serial",
       "theme": "light",
       "color": "#045071 ",
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
            "title": "Algemene chart",
            "type": "smoothedLine",
            "valueField": "visits",
            "bulletField": "bullet",
            "descriptionField": "description",
            "balloonText": "[[visits]]",            
            "bulletBorderThickness": 4,
            "bulletBorderAlpha": 1,
            "fillAlphas": 0.3,
        }],
       "chartScrollbar": {
           "autoGridCount": true,
           "graph": "g1",
           "backgroundColor": "#62ABCB ",
           "graphFillColor": "#1D7FAA ",
           "selectedBackgroundColor": "#62ABCB ",
           "selectedGraphFillColor": "#045071 ",
           "scrollbarHeight": 40
       },
       "chartCursor": {
          "limitToGraph":"g1",
          "cursorAlpha": .1
       },
       "categoryField": "date",
       "categoryAxis": {
           "parseDates": true,
           "axisColor": "#045071 ",
           "dashLength": 1,
           "minorGridEnabled": true
       },
       "export": {
           "enabled": true
       }
   });
}

//overall charts

var red = "#b93e00";
var blue = "#0071bb";
var yellow = "#f3e722";
var green = "#089e39";

var OverallDoughnutChartAge = document.getElementById("OverallDoughnutChartAge");
var newDoughnutChart = new Chart(OverallDoughnutChartAge, {
   type: 'doughnut',
   data: {
       labels: [
           "0 - 25",
           "25 - 45",
           "45 - 65",
           "65+"
       ],
       datasets: [{
           data: [65, 20, 10, 5],
           backgroundColor: [
               red,
               blue,
               yellow,
               green               
           ],
           hoverBackgroundColor: [
               red,
               blue,
               yellow,
               green  
           ]
       }]},
   animation:{
       animateScale:true
   },
   options: {
       responsive: true,
       maintainAspectRatio: false,
       scales: {
           width: 150, // the same as right - left
           height: 10, // the same as bottom - top
       },
       legend: {
           position: "right"
       }
   }
});

var OverallDoughnutChartLocation = document.getElementById("OverallDoughnutChartLocation");
var newDoughnutChart = new Chart(OverallDoughnutChartLocation, {
   type: 'doughnut',
   data: {
       labels: [
           "Leeuwarden",
           "Sneek",
           "Herenveen",
           "Overig"
       ],
       datasets: [{
           data: [35, 50, 10, 5],
           backgroundColor: [
               red,
               blue,
               yellow,
               green               
           ],
           hoverBackgroundColor: [
               red,
               blue,
               yellow,
               green  
           ]
       }]},
   animation:{
       animateScale:true
   },
   options: {
       responsive: true,
       maintainAspectRatio: false,
       scales: {
           width: 150, // the same as right - left
           height: 10, // the same as bottom - top
       },
       legend: {
           position: "right"
       }
   }
});

var OverallLineChart = document.getElementById("OverallLineChart");
var myLineChart = new Chart(OverallLineChart, {
    type: 'line',
    data: {
        labels: ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli"],
        datasets: [{
                label: "Groei betrokken personen",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [65, 59, 80, 81, 56, 55, 40],
            }]},
});

//facebook charts

var FacebookDoughnutChartAge = document.getElementById("FacebookDoughnutChartAge");
var newDoughnutChart = new Chart(FacebookDoughnutChartAge, {
   type: 'doughnut',
   data: {
       labels: [
           "0 - 25",
           "25 - 45",
           "45 - 65",
           "65+"
       ],
       datasets: [{
           data: [55, 30, 10, 5],
           backgroundColor: [
               red,
               blue,
               yellow,
               green               
           ],
           hoverBackgroundColor: [
               red,
               blue,
               yellow,
               green  
           ]
       }]},
   animation:{
       animateScale:true
   },
   options: {
       responsive: true,
       maintainAspectRatio: false,
       scales: {
           width: 150, // the same as right - left
           height: 10, // the same as bottom - top
       },
       legend: {
           position: "right"
       }
   }
});

var FacebookDoughnutChartLocation = document.getElementById("FacebookDoughnutChartLocation");
var newDoughnutChart = new Chart(FacebookDoughnutChartLocation, {
   type: 'doughnut',
   data: {
       labels: [
           "Leeuwarden",
           "Sneek",
           "Herenveen",
           "Overig"
       ],
       datasets: [{
           data: [20, 30, 30, 10],
           backgroundColor: [
               red,
               blue,
               yellow,
               green               
           ],
           hoverBackgroundColor: [
               red,
               blue,
               yellow,
               green  
           ]
       }]},
   animation:{
       animateScale:true
   },
   options: {
       responsive: true,
       maintainAspectRatio: false,
       scales: {
           width: 150, // the same as right - left
           height: 10, // the same as bottom - top
       },
       legend: {
           position: "right"
       }
   }
});

var FacebookLineChart = document.getElementById("FacebookLineChart");
var myLineChart = new Chart(FacebookLineChart, {
    type: 'line',
    data: {
        labels: ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli"],
        datasets: [{
                label: "Groei betrokken personen",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [34, 21, 40, 50, 56, 55, 60],
            }]},
});