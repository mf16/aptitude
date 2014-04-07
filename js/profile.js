var chart = AmCharts.makeChart("profileHeroChart", {
    "type": "serial",
    "theme": "none",
    "dataProvider": [
    {"date": 2013-09-01, "comprehension": 90, "completion": 7},
    {"date": 2013-09-02, "comprehension": 98, "completion": 99},
    {"date": 2013-09-05, "comprehension": 95, "completion": 100},
    {"date": 2013-09-08, "comprehension": 90, "completion": 100},
    {"date": 2013-09-10, "comprehension": 99, "completion": 100}
    ],
    "graphs": [{
        "balloonText": "<span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>",
        "fillAlphas": 0.6,
        "lineAlpha": 0.4,
        "title": "Comprehension",
        "valueField": "comprehension",
    }, {
        "balloonText": "<span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>",
        "fillAlphas": 0.6,
        "lineAlpha": 0.4,
        "title": "Completion",
        "valueField": "completion"
    }],

    "chartCursor": {"cursorAlpha": 0},
    "categoryField": "date",
});