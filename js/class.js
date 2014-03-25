$(function () {
  new Morris.Bar({
    element: 'completionProgress',
    data: [
      {section: 'Inequalities', Completion: 100},
      {section: 'Absolute values', Completion: 100},
      {section: 'Functions', Completion: 100},
      {section: 'Cartesian plane', Completion: 100},
      {section: 'Pythagorean Theorem', Completion: 95},
      {section: 'Powers and Radicals', Completion: 98},
      {section: 'Scientific Notation', Completion: 100},
      {section: 'Scaling Problems', Completion: 83},
      {section: 'Quadratic Equations', Completion: 74},
      {section: 'Euclidean Algorithm ', Completion: 70},
      {section: 'Factoring', Completion: 12},
      {section: 'Graphing Functions', Completion: 10},
      {section: 'Conic Sections', Completion: 3},
      {section: 'Linear Systems and Solutions', Completion: 3}
    ],
    xkey: 'section',
    ykeys: ['Completion'],
    labels: ['Percent Completed'],
    barColors: ['#17A271'],
    barRatio: 0.4,
    xLabelAngle: 35,
    hideHover: 'auto'
  });
})