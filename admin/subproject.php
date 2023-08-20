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
<h5>New sub-project<button id="todo-btn" class="btn btn-sm btn-outline-dark" style="float:right;" href="#viewSubProjectModal" role="button" data-bs-toggle="modal"><i class="fas fa-boxes"></i> View sub-project</button></h5><hr>



<div id="card-size2" class="card mt-5 mx-auto shadow-sm bg-white rounded" style="width:40rem">
  <div class="card-header text-left">
    Project Twin: <span class="float-right">Overall Progress <span class="badge badge-info">33.75%</span></span>
  </div>
    
  <!--table-->
  <div class="card-body"><br>
  <div class="row pr-5 mr-5">
      <div class="col text-right">
          <label>Work Type:</label>
      </div>
      <div class="col text-center">
          <input type="text" class="form-control mb-2" placeholder="Work Type">
      </div>
  </div>


  <div class="row pr-5 mr-5">
      <div class="col text-right">
          <label>Start Date:</label>
      </div>
      <div class="col text-center">
          <input type="date" class="form-control mb-2">
      </div>
  </div>


  <div class="row pr-5 mr-5">
      <div class="col text-right">
          <label>End Date:</label>
      </div>
      <div class="col text-center">
          <input type="date" class="form-control mb-2">
      </div>
  </div>


  <div class="row pr-5 mr-5">
      <div class="col text-right">
          <label>Assigned Team/Group:</label>
      </div>
      <div class="col text-center">
          <input type="text" class="form-control mb-3" placeholder="Assigned Team/Group">
      </div>
  </div>


  <div class="btn-group float-right mt-4">
      <button class="btn btn-outline-primary btn-sm mr-2 ">Save</button>    
      <button class="btn btn-outline-secondary btn-sm" onClick="window.location='project.php';" >Exit</button>    
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