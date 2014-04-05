
///COMPARISON BAR CHART///
var chart;
var chartData = [
    [
        { section: "Concept 1", completion: 98, understanding: 87},
        { section: "Concept 2", completion: 94, understanding: 16},
        { section: "Concept 3", completion: 90, understanding: 90},
        { section: "Concept 4", completion: 90, understanding: 72},
        { section: "Concept 5", completion: 73, understanding: 63},
        { section: "Concept 6", completion: 24, understanding: 20},
        { section: "Concept 7", completion: 4, understanding: 4}
    ]
]

var pieChartData = [
    { section: "Concept 2", percent: 73},
    { section: "Concept 5", percent: 20},
    { section: "Concept 6", percent: 7}
]



AmCharts.ready(function() {
    // SERIAL CHART
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
    var understanding = new AmCharts.AmGraph();
    understanding.type = "column";
    understanding.valueField = "understanding";
    understanding.fillAlphas = 0.6;
    understanding.balloonText = "[[section]] <br>Understanding: [[value]]%";
    chart.addGraph(understanding);
    // GRAPH
    var completion = new AmCharts.AmGraph();
    completion.type = "column";
    completion.valueField = "completion";
    completion.fillAlphas = 0.6;
    completion.balloonText = "[[section]] <br>Completion: [[value]]%";
    completion.fillColors = '#949494';
    completion.lineColor = '#949494';
    chart.addGraph(completion);
    // WRITE
    chart.write("conceptBreakdown");


     // GRAPH
    var pieChart = new AmCharts.AmPieChart();
    pieChart.valueField = "percent";
    pieChart.titleField = "section";
    pieChart.labelRadius =  '5';
    pieChart.radius = '35%';
    pieChart.innerRadius = "60%";
    pieChart.colors = [
        '#17A271', '#2B7A5E', '#076947', '#4AD1A1', '#6ED1AE'
    ];
    pieChart.dataProvider = pieChartData;
    // WRITE
    pieChart.write("pieChart");


});





function selectDataset(d) {
    chart.dataProvider = chartData[d];
    chart.validateData();
    chart.animateAgain();
}

