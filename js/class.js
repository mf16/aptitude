var chart;

var chartData = [
    // Data set #1
    [
        { country: "Czech Republic", litres: 156.90},
        { country: "Ireland", litres: 131.10},
        { country: "Germany", litres: 115.80},
        { country: "Australia", litres: 109.90},
        { country: "Austria", litres: 108.30},
        { country: "UK", litres: 99.00}
    ],
    // Data set #2
    [
        { country: "Czech Republic", litres: 101.20},
        { country: "Ireland", litres: 141.20},
        { country: "Germany", litres: 91.80},
        { country: "Australia", litres: 101.90},
        { country: "Austria", litres: 125.30},
        { country: "UK", litres: 101.50}
    ]
]

AmCharts.ready(function() {
    // RADAR CHART
    chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData[0];
    chart.categoryField = "country";
    chart.startDuration = 1;
    chart.sequencedAnimation = false;

    // VALUE AXIS
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.axisAlpha = 0.15;
    valueAxis.minimum = 0;
    valueAxis.dashLength = 3;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.type = "column";
    graph.valueField = "litres";
    graph.fillAlphas = 0.6;
    graph.balloonText = "[[value]] litres of beer per year";
    chart.addGraph(graph);

    // WRITE
    chart.write("completionProgress");
});

function selectDataset(d) {
    chart.dataProvider = chartData[d];
    chart.validateData();
    chart.animateAgain();
}