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
        if(isset($_GET['project-id'])){
        $sql = "SELECT * FROM tbl_subprojects where project_id=". $_GET['project-id'];
        $stmt = mysqli_query($db, $sql);
        while ($datarows = mysqli_fetch_assoc($stmt)) {
            echo "['" . $datarows['id'] . " ','" . $datarows['work_type'] . " ', new Date(" . $datarows['syy'] . "," . $datarows['smm']-1 . "," . $datarows['sdd'] . "),
             new Date(" . $datarows['eyy'] . "," . $datarows['emm']-1 . "," . $datarows['edd'] . "), " . 'null' . " ," . $datarows['progress'] . ",  " . 'null' .  "],";
        }
         }
        ?>

      ]);
      

      var options = {
        //height: 400,
        title: "Project",

        gantt: {
          trackHeight: 28
        
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div1')
      );
      chart.draw(data, options);
     
    }

</script>