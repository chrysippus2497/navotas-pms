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
<h5>Update Project Progress <button id="todo-btn" class="btn btn-sm btn-outline-dark" style="float:right;" href="#addProjectModal" role="button" data-bs-toggle="modal"><i class="fas fa-boxes"></i> Add sub-project</button></h5><hr>



<div id="card-size2" class="card mt-5 mx-auto shadow-sm bg-white rounded" style="width:40rem">
  <div class="card-header text-left">
    Project Twin: <span class="float-right">Overall Progress <span class="badge badge-info">33.75%</span></span>
  </div>
    
  <!--table-->
  <div class="card-body">
  <div class="row mx-auto">
      <div class="col text-center">
          <h6 class="text-left">Sub-Project List</h6><hr> <br>
          <h6>Flooring:  <span class="badge badge-info ml-3">50%</span> <span class="ml-4 text-secondary">8/9/22 - 8/15/2022</span> <button class="btn btn-outline-primary btn-sm ml-4">Edit</button></h6>
          <h6>Flooring:  <span class="badge badge-info ml-3">50%</span> <span class="ml-4 text-secondary">8/9/22 - 8/15/2022</span> <button class="btn btn-outline-primary btn-sm ml-4">Edit</button></h6>
          <h6>Flooring:  <span class="badge badge-info ml-3">50%</span> <span class="ml-4 text-secondary">8/9/22 - 8/15/2022</span> <button class="btn btn-outline-primary btn-sm ml-4">Edit</button></h6>
          <h6>Flooring:  <span class="badge badge-info ml-3">50%</span> <span class="ml-4 text-secondary">8/9/22 - 8/15/2022</span> <button class="btn btn-outline-primary btn-sm ml-4">Edit</button></h6>
          <br> <br>
          
        </div>
 

      <div class="btn-group">
      <button class="btn btn-outline-primary btn-sm mr-5">Save</button>    
      <button class="btn btn-outline-secondary btn-sm" onClick="window.location='project.php';" >Exit</button>    
      </div>
  </div>

   </div>
   

  </div>



</div>
<script type="text/javascript" src="js/sidebar.js"></script>

</body>
</html> 

<?php 
include '../modal.php';
?>