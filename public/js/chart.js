var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [          
          'Masukan', 
          'Keluhan', 
      ],
      datasets: [
        {
          data: [700,500],
          backgroundColor : ['#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })