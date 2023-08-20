<?php include 'includes/top.php';
include 'includes/sidebar.php';
include 'includes/header.php';
include 'includes/functions.php' ?>

<body>
<style>
    progress{
      height:30px;
    width:300px;
     position:relative;
    }
    progress::before{
    left:20px;
    font-size:12px;
    padding-top:8px;
    width:70%;
    padding-left:5px;
    display:flex;
    color:white;
    align-items:center;
    padding-right:10px;
    }
    .percentage{
        position:absolute;
        padding-top:7px;
        font-size:12px; 
        margin-left:-295px;
        color:white;
    }
  </style>
<div class="container" id="main">
<h5>Dashboard <button id="todo-btn" class="btn btn-sm btn-outline-dark" style="float:right;" href="#todoListModal" role="button" data-bs-toggle="modal"><i class="fas fa-clipboard-list"></i> To do list</button></h5><hr>

<div class="row show-grid">
        <div style="margin-left:120px;" class="col-sm-3 mt-3">
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2 rounded-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs text-dark text-uppercase mb-1 ml-3">Total Projects</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 ml-5 pl-4 font-weight-bold text-gray-800">
                          <?php 
                            projectCount(); 
                          ?>
                          </div>
                        </div>
                      </div>        
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-check fa-2x text-gray-300 mr-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2 rounded-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs text-dark text-uppercase mb-1 ml-3">Total materials</div>
                      <div class="h6 mb-0 ml-5 pl-4 pl-2 font-weight-bold text-gray-800">
                         <?php 
                            materialCount(); 
                          ?>
                          </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-boxes fa-2x text-gray-300 mr-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div  class="col-sm-3 mt-3">
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2 rounded-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div style="font-size:16px;" class="text-xs text-dark text-uppercase mb-1 ml-2">total sub-projects</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h6 mb-0 ml-5 pl-4 font-weight-bold text-gray-800">
                          <?php 
                            subprojectCount(); 
                          ?>
                          </div>
                        </div>
                      </div>        
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-gray-300 mr-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2 rounded-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs text-dark text-uppercase mb-1 ml-3">Total employees</div>
                      <div class="h6 mb-0 ml-5 pl-4 font-weight-bold text-gray-800">
                          <?php 
                            employeeCount(); 
                          ?>
                          </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300 mr-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>


            <div  class="col-sm-3 mt-3">
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2 rounded-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div style="font-size:16px;" class="text-xs text-dark text-uppercase mb-1 ml-2">archived projects</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h6 mb-0 ml-5 pl-4 font-weight-bold text-gray-800">
                          <?php 
                            archivedprojectCount(); 
                          ?>
                          </div>
                        </div>
                      </div>        
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-gray-300 mr-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2 rounded-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs text-dark text-uppercase mb-1 ml-3">archived employees</div>
                      <div class="h6 mb-0 ml-5 pl-4 font-weight-bold text-gray-800">
                          <?php 
                            archivedemployeeCount(); 
                          ?>
                          </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300 mr-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

           
            </div>




           <div class="card" style="width:50rem; margin-left:130px;">
             <div class="card-header">
              Project List
             </div>
             <div class="card-body">
               <?php
               ongoingProjectCount();
               ?>
             </div>
           </div>
          
        
 </div>
  
</div>

</div>

 


<script type="text/javascript" src="js/sidebar.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">
    loadNotes();
    
</script>
</body>
</html> 

<?php 
include '../modal.php';
?>