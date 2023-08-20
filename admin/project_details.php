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
<h5>Project Management <button id="todo-btn" class="btn btn-sm btn-outline-dark" style="float:right;" href="#addProjectModal" role="button" data-bs-toggle="modal"><i class="fas fa-calendar-plus"></i> Add Project</button></h5><hr>

<?php 
  if(isset($_GET['project_type'])){
    echo '<div class="pt-2" id="success-alert"><span class="alert alert-success">Successfuly Added Project '.$_GET['project_name'].'!</span></div>';
  }
?>

<div id="card-size" class="card mt-4 mx-auto shadow-sm bg-white rounded" style="width:70rem">
  <div class="card-header text-left">
    Projects
  </div>

 
  <!--table-->
  <div class="card-body">
      <table class="table table-bordered table-hover projectTable" id="projectTable" width="100%" cellspacing="0">
      <thead>
      <tr>
          <th>Project List</th>
          <th>Location</th>
          <th>Start</th>
          <th>Deadline</th>
          <th>Status</th>
          <th></th>
      </tr>
      </thead><tbody>                 
          <?php
          include 'includes/config.php';
          $stmt = $db_con->query("SELECT * FROM tbl_projects");
          while ($row = $stmt->fetch()) {           
            if($row['status']=="Active")
            {
              $status = '<span class="badge badge-success badge-sm">'.$row['status'].'</span>';
            }
            else{
              $status = '<span class="badge badge-danger badge-sm">'.$row['status'].'</span>';
            }

              echo '<td>'.$row['project_name'].'</td>';
              echo '<td>'.$row['location'].'</td>';
              echo '<td>'.$row['start_date'].'</td>';
              echo '<td>'.$row['end_date'].'</td>';
              echo '<td>'.$status.'</td>';
              echo '<td><button id="todo-btn" class="btn btn-sm btn-outline-dark" href="#viewProjectModal" role="button" data-bs-toggle="modal"><i class="fas fa-search"></i> View Project</button></td>';
             
            
            echo '</tr> ';

          }

?>
</tbody></table>

</div> 
</div>

</div>

<script type="text/javascript" src="js/sidebar.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

<script>
  //Datatable
    $(document).ready(function(){
      $('#projectTable').DataTable({
      });
    });
  //Success
    $("#success-alert").fadeTo(3000, 600).slideUp(600, function(){
    $("#success-alert").slideUp(600);
    });
    
</script>

</body>
</html> 

<?php 
include '../modal.php';
?>