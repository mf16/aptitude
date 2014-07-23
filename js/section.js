 $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $(".video").fitVids();
  });

function changeModal(title, content){
	$('#myModalLabel').html(title);
	$('.modal-body').html(content);
}


JXG.Options.grid.snapToGrid = true;
JXG.Options.elements.fixed = true;
/*numberLine1*/
var board = JXG.JSXGraph.initBoard('numberLine1', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var p1 = board.create('point',[1,0], {fillColor : '#ddd', highlightFillColor : '#ddd', strokeColor : '#333', highlightStrokeColor : '#333', name:'A'});
var p2 = board.create('point',[4,0], {fillColor : '#ddd', highlightFillColor : '#ddd', strokeColor : '#333', highlightStrokeColor : '#333', name:'B'});
var li = board.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});

/*numberLine2*/
var board2 = JXG.JSXGraph.initBoard('numberLine2', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var p1 = board2.create('point',[1,0], {fillColor : '#333', highlightFillColor : '#333', strokeColor : '#333', highlightStrokeColor : '#333', name:'A'});
var p2 = board2.create('point',[4,0], {fillColor : '#ddd', highlightFillColor : '#ddd', strokeColor : '#333', highlightStrokeColor : '#333', name:'B'});
var li = board2.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});



/*numberLine3*/
var board3 = JXG.JSXGraph.initBoard('numberLine3', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var p1 = board3.create('point',[1,0], {fillColor : '#ddd', highlightFillColor : '#ddd', strokeColor : '#333', highlightStrokeColor : '#333', name:'A'});
var p2 = board3.create('point',[4,0], {fillColor : '#333', highlightFillColor : '#333', strokeColor : '#333', highlightStrokeColor : '#333', name:'B'});
var li = board3.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});


/*numberLine3*/
var board3 = JXG.JSXGraph.initBoard('numberLine4', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var p1 = board3.create('point',[1,0], {fillColor : '#333', highlightFillColor : '#333', strokeColor : '#333', highlightStrokeColor : '#333', name:'A'});
var p2 = board3.create('point',[4,0], {fillColor : '#333', highlightFillColor : '#333', strokeColor : '#333', highlightStrokeColor : '#333', name:'B'});
var li = board3.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});

/*numberLine5*/
var board5 = JXG.JSXGraph.initBoard('numberLine5', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var axisx = board5.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: true,
    lastArrow: false,
    ticks: {
      insertTicks: false,
      drawZero: false,
      drawLabels:false,
      minorTicks: 0
    }
  });
var p1 = board5.create('point',[-1,0], {name:'A'});
var p2 = board5.create('point',[4,0], {fillColor : '#ddd', highlightFillColor : '#ddd', strokeColor : '#333', highlightStrokeColor : '#333', name:'B'});
var li = board5.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});



/*numberLine6*/
var board6 = JXG.JSXGraph.initBoard('numberLine6', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var axisx = board6.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: true,
    lastArrow: false,
    ticks: {
      insertTicks: false,
      drawZero: false,
      drawLabels:false,
      minorTicks: 0
    }
  });
var p1 = board6.create('point',[-1,0], {name:'A'});
var p2 = board6.create('point',[4,0], {fillColor : '#333', highlightFillColor : '#333', strokeColor : '#333', highlightStrokeColor : '#333', name:'B'});
var li = board6.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});



/*numberLine7*/
var board7 = JXG.JSXGraph.initBoard('numberLine7', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var axisx = board7.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: false,
    lastArrow: true,
    ticks: {
      insertTicks: false,
      drawZero: false,
      drawLabels:false,
      minorTicks: 0
    }
  });
var p1 = board7.create('point',[1,0], {fillColor : '#ddd', highlightFillColor : '#ddd', strokeColor : '#333', highlightStrokeColor : '#333', name:'A'});
var p2 = board7.create('point',[6,0], {name:'B'});
var li = board7.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});



/*numberLine8*/
var board8 = JXG.JSXGraph.initBoard('numberLine8', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var axisx = board8.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: false,
    lastArrow: true,
    ticks: {
      insertTicks: false,
      drawZero: false,
      drawLabels:false,
      minorTicks: 0
    }
  });
var p1 = board8.create('point',[1,0], {fillColor : '#333', highlightFillColor : '#333', strokeColor : '#333', highlightStrokeColor : '#333', name:'A'});
var p2 = board8.create('point',[6,0], {name:'B'});
var li = board8.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});




/*numberLine9*/
var board9 = JXG.JSXGraph.initBoard('numberLine9', 
  {
    boundingbox: [0, 3, 5, -1],
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
    }

  }
);
var axisx = board9.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: true,
    lastArrow: true,
    ticks: {
      insertTicks: false,
      drawZero: false,
      drawLabels:false,
      minorTicks: 0
    }
  });
var p1 = board9.create('point',[-1,0], {name:'A'});
var p2 = board9.create('point',[6,0], {name:'B'});
var li = board9.create('line',[p1,p2], {strokeColor:'#666', highlightStrokeColor:'#666', straightFirst:false, straightLast:false, strokeWidth:2});




/*
JXG.Options.grid.snapToGrid = true;
JXG.Options.elements.fixed = true;
/*numberLine1
var board = JXG.JSXGraph.initBoard('numberLine1', 
  {
    boundingbox:[0,3,3,-1], 
    showNavigation: false, 
    pan: false,
    zoom: {
            factorX: 1.25,
            factorY: 1.25,
            wheel: false,
            needshift: false,
            eps: 0.1
        }
  });
var axisx = board.create('axis', [[0,0], [1,0]], 
  {
    firstArrow: false,
    lastArrow: false,
    ticks: {
      insertTicks: false,
      drawZero: false,
      drawLabels:false,
      minorTicks: 0
    }
  });
var p1 = board.create('point', [1, 0, axisx]);
var p2 = board.create('point', [2, 0, axisx]);
var l1 = board.create('line', [p1, p2]);
*/