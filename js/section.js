 $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $(".video").fitVids();
  });

function changeModal(title, content){
	$('#myModalLabel').html(title);
	$('.modal-body').html(content);
}


JXG.Options.grid.snapToGrid = true;
var brd = JXG.JSXGraph.initBoard('jxgbox', {boundingbox:[-6,2,6,-2]});
var axisx = brd.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: true,
    lastArrow: true,
    ticks: {
      drawZero: true,
      ticksDistance: 1,
      majorHeight: 30,
      tickEndings: [1,1],
      minorTicks: 0
    }
  });
var p = brd.create('glider', [2, 0, axisx], {snapWidth:1});
var p = brd.create('glider', [4, 0, axisx], {snapWidth:1});