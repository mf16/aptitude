$(window).load(function() {
	$( '#slidingMenu' ).animate({'left' : "+=200px"}, 1000);
	$( 'header' ).animate({'margin-left' : "+=200px"}, 1000);
	$( 'footer' ).animate({'margin-left' : "+=200px"}, 1000);
	$( '#content' ).animate({'margin-left' : "+=200px"}, 1000);
});


$(function () {
  new Morris.Area({
    // ID of the element in which to draw the chart.
    element: 'completionProgress',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      { chapter: '1', value: 100 },
      { chapter: '2', value: 99 },
      { chapter: '3', value: 85 },
      { chapter: '4', value: 80 },
      { chapter: '5', value: 45 },
      { chapter: '6', value: 5 },
      { chapter: '7', value: 1 },
      { chapter: '8', value: 0 },
      { chapter: '9', value: 0 },
      { chapter: '10', value: 0 }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'chapter',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Percent completed'],
    hideHover: 'auto',
  });
});
