
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([
        ['2014Spring', 'Flooring', 'spring',
         new Date(2021, 2, 22), new Date(2022, 5, 20), null, 100, null],
        ['2014Summer', 'Roof', 'summer',
         new Date(2021, 5, 21), new Date(2022, 8, 20), null, 100, null],
        ['2014Autumn', 'Window', 'autumn',
         new Date(2021, 8, 21), new Date(2022, 11, 20), null, 100, null],
        ['2014Winter', 'Foundation', 'winter',
         new Date(2021, 11, 21), new Date(2022, 2, 21), null, 100, null],
        ['2015Spring', 'Walls', 'spring',
         new Date(2021, 2, 22), new Date(2022, 5, 20), null, 50, null],
        ['2015Summer', 'Paint', 'summer',
         new Date(2021, 5, 21), new Date(2022, 8, 20), null, 0, null]
       
      ]);

      var options = {
        height: 220,
        gantt: {
          trackHeight: 30
        
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));
      chart.draw(data, options);
     
    }
