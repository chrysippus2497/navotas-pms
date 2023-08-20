<script type="text/javascript" >
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');


      data.addRows([
      <?php
        $db = mysqli_connect('localhost', 'root', '', 'pms');
        global $db;
        $sql = "SELECT * FROM tbl_subprojects";
        $stmt = mysqli_query($db, $sql);
        while ($datarows = mysqli_fetch_assoc($stmt)) {
            if ($datarows !=null || $datarows !=false || $datarows!=0){
            echo "['" . $datarows['id'] . " ','" . $datarows['work_type'] . " ', new Date(" . $datarows['syy'] . "," . $datarows['smm'] . "," . $datarows['sdd'] . "),
             new Date(" . $datarows['eyy'] . "," . $datarows['emm'] . "," . $datarows['edd'] . "), " . 'null' . " ," . $datarows['progress'] . ",  " . 'null' .  "],";
            }
            else{
                
            }
            }
        ?>

      ]);
      

      var options = {
        height: 220,
        gantt: {
          
          trackHeight: 30
        
        }
      };


      var chart = new google.visualization.Gantt(document.getElementById('chart_div')
      );
      chart.draw(data, options);
     
    }
 
</script>

