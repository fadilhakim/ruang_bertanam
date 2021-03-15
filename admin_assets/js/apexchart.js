$(function() {
  'use strict';



  // Apex Pie chart end
  var options = {
    chart: {
      height: 300,
      type: "pie"
    },
    colors: ["#f77eb9", "#7ee5e5","#4d8af0","#fbbc06"],
    legend: {
      position: 'top',
      horizontalAlign: 'center'
    },
    stroke: {
      colors: ['rgba(0,0,0,0)']
    },
    dataLabels: {
      enabled: false
    },
    series: [44, 55, 13, 33]
  };

  var chart = new ApexCharts(document.querySelector("#apexPie"), options);

  chart.render();
  // Apex Pie chart end


});
