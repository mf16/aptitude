var chart;

var chartData = [
    [
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 29},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 78},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 29},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 100},
        { section: "Functions", completion: 90},
        { section: "Functions", completion: 15}
    ]
]

AmCharts.ready(function() {
    // RADAR CHART
    chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData[0];
    chart.categoryField = "section";
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
    graph.valueField = "completion";
    graph.fillAlphas = 0.6;
    graph.balloonText = "[[section]] <br> [[value]]% completed";
    chart.addGraph(graph);

    // WRITE
    chart.write("completionProgress");
});

function selectDataset(d) {
    chart.dataProvider = chartData[d];
    chart.validateData();
    chart.animateAgain();
}

