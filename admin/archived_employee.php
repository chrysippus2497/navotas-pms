<?php include 'includes/top.php';
include 'includes/sidebar.php';
include 'includes/header.php'; ?>
<style>
table {
  border-collapse: collapse;
  width: 100%;

}

td, th {
  border: 1px solid #dddddd;
  padding: 6px;
  text-align:center;
}
tr{
  text-align:center;
}
tbody{
  font-size:15px;
  
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
<div class="container" id="main">
<h5>Archived Employee Management </h5><hr>
<?php 
  if(isset($_GET['firstname'])){
    echo '<div class="pt-2" id="success-alert"><span class="alert alert-success">Successfuly Added an Employee</span></div>';
  }
  if(isset($_GET['error'])){
    echo '<div class="pt-2" id="danger-alert"><span class="alert alert-success">Incorrect Password!</span></div>';
  }

  if(isset($_GET['r'])){
    echo '<div class="pt-2" id="success-alert"><span class="alert alert-success">Successfuly Restored an Employee</span></div>';
  }

  if(isset($_GET['a'])){
    echo '<div class="pt-2" id="success-alert"><span class="alert alert-success">Successfuly Archived an Employee</span></div>';
  }
?>

  <div id="card-size" class="card mt-4 mx-auto shadow-sm bg-white rounded" style="width:70rem">
  <div class="card-header text-left">
    Inactive Employees
  </div>
  <!--table-->
  <div class="card-body">
      <table class="table table-bordered table-hover employeeTable1" id="employeeTable1" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th>Name</th>
        <th>Position</th>
        <th>Team</th>
        <th>Deployed on</th>
        <th>Sub Project</th>
        <th>Profile</th>
        <th>Restore</th>
        </tr>
        </thead>
        <tbody>
       
            <?php
              include 'includes/config.php';
              $stmt = $db_con->query("SELECT *, e.id as id, p.id as project_id, e.team_assigned as team_assigned FROM tbl_employee as e LEFT JOIN tbl_projects as p ON e.project_id = p.id LEFT JOIN tbl_subprojects as s ON e.subproject_id = s.id WHERE e.status='Inactive'");
              while ($row = $stmt->fetch()){
                echo '<td hidden>'.$row['id'].'</td>';
                echo '<td hidden>'.$row['firstname'].'</td>';
                echo '<td hidden>'.$row['middlename'].'</td>';
                echo '<td hidden>'.$row['lastname'].'</td>';
                echo '<td hidden>'.$row['birthday'].'</td>';
                echo '<td hidden>'.$row['address'].'</td>';
                echo '<td hidden>'.$row['marital_status'].'</td>';
                echo '<td hidden>'.$row['hired_date'].'</td>';
                echo '<td>'.$row['firstname'].' '.$row['lastname'].'</td>';
                echo '<td>'.$row['position'].'</td>';
                echo '<td>'.$row['team_assigned'].'</td>';
                echo '<td hidden>'.$row['status'].'</td>';
                echo '<td>'.$row['project_name'].'</td>';
                echo '<td>'.$row['work_type'].'</td>';
                echo '<td><a type="button" id="todo-btn" class="btn btn-sm btn-outline-dark editEmployee"><i class="fas fa-search"></i> View Profile</a></td>';
                echo '<td><a href="includes/functions.php?r='.$row['id'].'" type="button" class="btn btn-outline-success btn-sm" ><i class="fas fa-undo"></i> Restore</a></td>';
                echo '</tr> ';
              }
            ?>
          
        </tbody>

      </table>
    </div>
  </div>

</div>
<script type="text/javascript" src="js/sidebar.js"></script>
<script type="text/javascript">
  //Datatable
    $(document).ready(function(){
      $('#employeeTable').DataTable({
      });
    });

    $(document).ready(function(){
      $('#employeeTable1').DataTable({
      });
    });


    $(document).ready(function(){
    $('.editEmployee').on('click',function(){
        $('#viewEmployeeModal').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();
        }).get();
        console.log(data);
    $('#id4').val(data[0]);
    $('#firstname1').val(data[1]);
    $('#middlename1').val(data[2]);
    $('#lastname1').val(data[3]);
    $('#birthday1').val(data[4]);
    $('#address1').val(data[5]);
    $('#marital_status1').val(data[6]);
    $('#hired_date1').val(data[7]);
    $('#position1').val(data[9]);
    $('#team_assigned4').val(data[10]);
    $('#status').val(data[11]);

    });
  });


    $(document).ready(function(){
    $('.editDeployment').on('click',function(){
        $('#deploymentModal').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();
        }).get();
        console.log(data);
    $('#id5').val(data[0]);

    });
  });

  </script>
</body>
</html> 

<?php 
include '../modal.php';
?>
<script>
  
viewSubProject(<?php echo $_GET['project-id']; ?>);
viewPercent(<?php echo $_GET['project-id']; ?>);
viewPercent2(<?php echo $_GET['project-id']; ?>);
</script>