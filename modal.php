<!-- To do list ------------------------------------------>
<div id="todoListModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Important Note</h5>
                </div>
                <div class="modal-body">
                <form onsubmit="return addNotes();">
              
                <input type="hidden" id="user_id" value="<?php echo $_SESSION['id'];?>">
                <div class="form-group mb-3 col-lg-12">
                    <label class="">Title: </label>
                    <textarea style="font-size:12px;" type="text" name="title" id="title" rows="1" class="form-control col-lg-12"></textarea>
                </div>
                <div class="form-group mb-3 col-lg-12">
                    <label class="">Write a note: </label>
                    <textarea style="font-size:12px;" type="text" name="note" id="note" rows="4" class="form-control col-lg-12"></textarea>
                </div>
                <hr>
               <style>
                  
               </style>
               <h6 class="modal-title ml-3">Notes:</h6>
               <div class="note-list" id="data"></div>
                
                <script>
               
           
            </script>
            </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-dark btn-sm" value="Add note">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add project modal ------------------------------------------>
<div id="addProjectModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Project</h5>
                </div>
                <div class="modal-body">
                <form onsubmit="return addProject();">
                <input type="hidden" id="added_by" value="<?php echo $_SESSION['id'];?>">
               
                <div class="row">
                <div class="col-sm ml-5">
                <label>Project Type:</label>
                    <select type="text" name="project_type" id="project_type" class="form-control col-sm-8">
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Industrial">Industrial</option>
                        <option value="Institutional">Institutional</option>
                        <option value="Infrastructure">Infrastructure</option>
                        <option value="Environmental">Environmental</option>

                    </select>
                </div>
                <div class="col-sm">
                <label class="">Project Name: </label>
                    <textarea type="text" name="project_name" id="project_name"  rows="2" cols="30" class="form-control col-lg-10" placeholder="Project Name" required></textarea>
                </div></div>


                <div class="row">
                <div class="col-sm ml-5 mt-1">
                <label class="mr-4 pr-3">Client Name: </label>
                    <textarea type="text" name="client_name" id="client_name"  rows="2" cols="30" class="form-control col-lg-10" placeholder="Client Name" required></textarea>
                </div>
                <div class="col-sm mt-1">
                <label>Client Contact: </label>
                    <textarea type="text" name="client_contact" id="client_contact"  rows="2" cols="30" class="form-control col-lg-10" placeholder="Client Contact" required></textarea>
                </div></div>


                <div class="row">
                <div class="col-sm ml-5 mt-1">
                <label class="mr-5 pr-4">Location: </label>
                    <textarea type="text" name="location" id="location"  rows="2" cols="30" class="form-control col-lg-10" placeholder="Location" required></textarea>
                </div>
                <div class="col-sm">
                <label class="mr-5 pr-5 mt-1">Cost: </label>
                    <textarea type="text" name="cost" id="cost"  rows="1" cols="30" class="form-control col-lg-10" placeholder="Project Cost" required></textarea>
                </div></div>

                <div class="row">
                <div class="col-sm ml-5 mt-1">
                <label class="mr-4 pr-1">Starting Date: </label>
                    <input type="date" name="start_date" id="start_date"  class="form-control col-lg-7" required oninvalid="this.setCustomValidity('Start Date')">
                </div>
                <div class="col-sm mt-1">
                <label class="mr-5 pr-3">End Date: </label>
                    <input type="date" name="end_date" id="end_date"  class="form-control col-lg-7" required oninvalid="this.setCustomValidity('End date is required')">
                </div></div>

                <div class="row">
                <div class="col-sm ml-5 mt-1">
                <label class="mr-3">Team Assigned: </label>
                    <textarea type="text" name="team_assigned" id="team_assigned"  rows="2" cols="30" class="form-control col-lg-10" placeholder="Team Assigned" required></textarea>
                </div>
               </div>
               
             
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-success btn-sm" value="Save Project">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div></form>
            </div>
        </div>
    </div>
</div>





<!-- view project modal ------------------------------------------>
<div id="viewProjectModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project</h5>
                </div>
                <div class="modal-body">
                <div class="row">
                <div class="col">
                <ul class="list-unstyled">
                <li><h5 class="mb-3">Project Details</h5></li>
                <?php include 'includes/project.php';?>
                <hr>
                <div class="row">      
                <div class="col">
                <table id="data2" style="border:none;"></table>
                </div>
                
                </div>
                </div>
                
                <!--Gantt Chart-->
                <div class="col">
                <h6><?php echo $project_name.': '?><span id="data3"></span></h6>
                <div class="mx-auto" id="chart_div1">
            
                      <?php
                    function is_connected()
                    {
                        $connected = @fsockopen("www.example.com", 80); 
                        if ($connected){
                            fclose($connected);
                        }else{
                            $is_conn = "<span class='badge badge-danger'>Internet Connection is required to load google chart</span>"; 
                        }
                        return $is_conn;
                    }
                    echo is_connected();

                     include 'includes/progress_chart.php';?>                   

                </div>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</a>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- view project modal ------------------------------------------>
<div id="viewSubProjectModal"  style="font-family:poppinsmedium" class="modal bg-dark bg-opacity-50" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Progress Update</h5>
                </div>
                <div class="modal-body">
                    <p>Sub-Projects<hr></p>
                    <table style="width:90%;" class="ml-1" id="progress_data" >
                            <style>
                                table,tr,th,td{
                                    border:none !important;
                                }
                            </style>
                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th style="width:500px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table><br>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="closeViewSubProject()">Close</button>
                    <script>
                    function closeViewSubProject(){
                        $ ("#viewSubProjectModal").modal ("hide"); 
                    }
                </script>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- add sub project modal ------------------------------------------>
<div id="addSubProjectModal"  style="font-family:poppinsmedium" class="modal bg-dark bg-opacity-50" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Sub-Project</h5>
            </div>
            <div class="modal-body">
            <form onsubmit="return addSubProject();">

                <style>
                    .form-control{
                        font-size:14px;
                    }
                </style>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id'];?>">
            <input type="hidden" name="project_id" id="project_id" value="<?php echo $_GET['project-id'];?>">

            <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Work Type:</label>
                <div class="col-sm-8">
                    <input type="text" id="work_type" name="work_type" class="form-control" placeholder="Work Type">
                </div>
            </div>
            
            <div class="form-group row ml-5 mr-5">
                    <label class="col-sm-4 col-form-label text-center">Start Date:</label>
                <div class="col-sm-8">
                    <input type="date" id="start_date2" name="start_date2" class="form-control">
                </div>
            </div>

            <div class="form-group row ml-5 mr-5">
                    <label class="col-sm-4 col-form-label text-center">End Date:</label>
                <div class="col-sm-8">
                    <input type="date" id="end_date2" name="end_date2" class="form-control">
                </div>
            </div>

            <div class="form-group row ml-5 mr-5">
                    <label class="col-sm-4 col-form-label text-center">Assigned Team/Group:</label>
                <div class="col-sm-8">
                    <input type="text" id="team_assigned2" name="team_assigned2" class="form-control" placeholder="Assigned Team/Group">
                </div>
            </div>

            
        
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-outline-danger btn-sm" value="Save"/>
            <button type="button" class="btn btn-outline-danger btn-sm" onClick="closeSubProject()">Close</button>
            <script type="text/javascript" src="admin/js/gantt-chart.js"></script></form>
            <script>
                function closeSubProject(){
                    $ ("#addSubProjectModal").modal ("hide"); 
                }
            </script>
        </div>
            </div>
        </div>
    </div>
</div>



<!-- add material modal ------------------------------------------>
<div id="addMaterialModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Material</h5>
                </div>
                <div class="modal-body">
              
                <form onsubmit="return addMaterials();">
                <input type="hidden" id="added_by" value="<?php echo $_SESSION['id'];?>">
                <input type="hidden" id="subproject_id" value="<?php echo $_GET['id'];?>">

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Name:</label>
                <div class="col-sm-8">
                     <input type="text" name="name" id="name" class="form-control" placeholder="Material Name" required>
                </div>
                </div>

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Brand:</label>
                <div class="col-sm-8">
                    <input type="text" name="brand" id="brand" class="form-control" placeholder="Brand" required>
                </div>
                </div>
                
                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Unit:</label>
                <div class="col-sm-8">
                    <input type="text" name="unit" id="unit" class="form-control" placeholder="Unit" required>
                </div>
                </div>
                 

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Quantity:</label>
                <div class="col-sm-8">
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
                </div>
                </div>
               
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-success btn-sm" value="Save Material">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button></form>
                    <script type="text/javascript" src="admin/js/gantt-chart.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- edit material modal ------------------------------------------>
<div id="editMaterialModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Material</h5>
                </div>
                <div class="modal-body">
              
                <form onsubmit="return editMaterials();">
                <input type="hidden" id="added_by" value="<?php echo $_SESSION['id'];?>">
                <input type="hidden" name="subproject_id" id="subproject_id" value="<?php echo $_GET['id'];?>">
                <input type="hidden" name="id" id="id1">

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Name:</label>
                <div class="col-sm-8">
                     <input type="text" name="name" id="name1" class="form-control" placeholder="Material Name" required>
                </div>
                </div>

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Brand:</label>
                <div class="col-sm-8">
                    <input type="text" name="brand" id="brand1" class="form-control" placeholder="Brand" required>
                </div>
                </div>
                
                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Unit:</label>
                <div class="col-sm-8">
                    <input type="text" name="unit" id="unit1" class="form-control" placeholder="Unit" required>
                </div>
                </div>
                 

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Quantity:</label>
                <div class="col-sm-8">
                    <input type="number" name="quantity" id="quantity1" class="form-control" placeholder="Quantity" required>
                </div>
                </div>
               
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-primary btn-sm" value="Update Material">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button></form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- add employee modal ------------------------------------------>
<div id="addEmployeeModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Employee</h5>
                </div>
                <div class="modal-body">
                <form onsubmit="return addEmployee();">
                <input type="hidden" id="added_by" value="<?php echo $_SESSION['id'];?>">
                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">First Name: </label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-sm mt-1">
                <label>Middle Name: </label>
                <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" required>
                </div>
               
                <div class="col-sm mt-1">
                <label>Last Name: </label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                </div>
                </div>

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Birth Date: </label>
                <input type="date" name="birthday" id="birthday" class="form-control" required>
                </div>
                <div class="col-sm mt-1">
                <label>Address: </label>
                <textarea type="text" name="address" id="address" class="form-control" placeholder="Address" required></textarea>
                </div>
                </div>

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Marital Status: </label>
                <select type="text" name="marital_status" id="marital_status" class="form-control" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                </select>
                </div>
                <div class="col-sm mt-1">
                <label>Position: </label>
                <input type="text" name="position" id="position" class="form-control" placeholder="Position" required>
                </div>
                </div>

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Assigned Team: </label>
                <input type="text"  name="team_assigned" id="team_assigned3" class="form-control" placeholder="Assigned Team" required>
                </div>
                <div class="col-sm mt-1">
                <label>Hired Date: </label>
                <input type="date" name="hired_date" id="hired_date" class="form-control" required>
                </div>
                </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-success btn-sm" value="Add Employee">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button></form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- view employee modal ------------------------------------------>
<div id="viewEmployeeModal"  style="font-family:poppinsmedium" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employee Details</h5>
                </div>
                <div class="modal-body">
                <!--<form onsubmit="return editEmployee();">-->
                
                <input type="hidden" name="id" id="id4">
                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="">Employment Status: <input id="status" class="border-0"/></label>
                </div>
                <div class="col-sm mt-1">

                </div>
                </div>
                
                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">First Name: </label>
                <input type="text" name="firstname" id="firstname1" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-sm mt-1">
                <label>Middle Name: </label>
                <input type="text" name="middlename" id="middlename1" class="form-control" placeholder="Middle Name" required>
                </div>
               
                <div class="col-sm mt-1">
                <label>Last Name: </label>
                <input type="text" name="lastname" id="lastname1" class="form-control" placeholder="Last Name" required>
                </div>
                </div>

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Birth Date: </label>
                <input type="date" name="birthday" id="birthday1" class="form-control" required>
                </div>
                <div class="col-sm mt-1">
                <label>Address: </label>
                <textarea type="text" name="address" id="address1" class="form-control" placeholder="Address" required></textarea>
                </div>
                </div>

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Marital Status: </label>
                <select type="text" name="marital_status" id="marital_status1" class="form-control" required>
                <option>Single</option>
                <option>Married</option>
                <option>Complicated</option>
                </select>
                </div>
                <div class="col-sm mt-1">
                <label>Position: </label>
                <input type="text" name="position" id="position1" class="form-control" placeholder="Position" required>
                </div>
                </div>

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Assigned Team: </label>
                <input type="text" name="team_assigned" id="team_assigned4" class="form-control" placeholder="Assigned Team" required>
                </div>
                <div class="col-sm mt-1">
                <label>Hired Date: </label>
                <input type="date" disabled name="hired_date" id="hired_date1" class="form-control" required>
                </div>
                </div>

           

                </div>
                <div class="modal-footer">
                    <!--<input type="submit" class="btn btn-outline-primary btn-sm" value="Update Profile">-->
                    <a href="#confirmPasswordModal" role="button" data-bs-toggle="modal" class="btn btn-outline-primary btn-sm">Update Profile</a>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- deployment Modal ------------------------------------------>
<div id="deploymentModal"  style="font-family:poppinsmedium" class="modal bg-dark bg-opacity-50" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deployment</h5>
                </div>
                <div class="modal-body">
                <form onsubmit="return editDeployment();">

                <input type="hidden" name="id" id="id5">

                <?php 
                use pms\dropdown;
                include 'dropdown.php';
                $dropDown = new dropdown();
                $result = $dropDown->getAllproject();
                ?>

                <script>
                function getState(val) {
                    $("#loader").show();
                    $.ajax({
                    type: "POST",
                    url: "get_dropdown.php",
                    data:'project_id='+val,
                    success: function(data){
                        $("#subproject-list").html(data);
                        $("#loader").hide();
                    }
                    });
                }
                </script>
                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Project:</label>
                <div class="col-sm-8">
                <select name="project-list" id="project-list" class="form-control" onChange="getState(this.value);">
                <option value="">Select project</option>
                    <?php
                    foreach ($result as $project) {
                     ?>
                    <option value="<?php echo $project["id"]; ?>"><?php echo $project["project_name"]; ?></option>
                    <?php }?>
                    </select>                
                </div>
                </div>

                <div class="form-group row ml-5 mr-5 mt-4">
                    <label class="col-sm-4 col-form-label text-center">Sub-project:</label>
                <div class="col-sm-8">
                <select name="subproject-list" id="subproject-list" class="form-control">
                <option value="">Select sub-project</option>
                 </select>             
                </div>
                </div>
    
           
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-success btn-sm" value="Update Deployment">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button></form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- confirm Password Modal ------------------------------------------>
<div id="confirmPasswordModal"  style="font-family:poppinsmedium" class="modal bg-dark bg-opacity-50" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Password</h5>
                </div>
                <div class="modal-body">
                <form onsubmit="return editEmployee();">

                <div class="row">
                <div class="col-sm ml-2 mt-1">
                <label class="mr-4 pr-3">Please enter your password: </label>
                <input type="text" name="password" id="confirm_password" class="form-control" placeholder="Enter Password" required>
                </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-success btn-sm" value="Submit">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button></form>
                </div>
            </div>
        </div>
    </div>
</div>







<script type="text/javascript"src="js/functions.js"></script>
<script type="text/javascript" language="javascript" src="js/tabledit.js"></script>

<script type="text/javascript" language="javascript" >


$(document).ready(function(){
 var dataTable = $('#progress_data').DataTable({
    "language": {
      "emptyTable": "Add sub-project to update project progress"
    },
  "processing" : true,
  "serverSide" : true,
  searching: false, 
  paging: false, 
  info: false,
  "order" : [],
  "ajax" : {
   url:"includes/functions.php?fetchProgress&project-id=<?php echo $_GET['project-id']; ?>",
   type:"POST"
  }
 });

 $('#progress_data').on('draw.dt', function(){
  $('#progress_data').Tabledit({
    buttons: {
  edit: {
    class:'btn btn-sm btn-outline-primary',
    html:'<span class="fas fa-pencil-alt"></span>',
    action:'edit'
        }},
        deleteButton: false,
        editButton: true,
   url:'includes/functions.php?UpdateProgress',
   dataType:'json',
   columns:{
    identifier : [0, 'work_type'],
    editable:[[1, 'progress']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    
   }
  });
 });
  
  $('#todoListModal').hasClass('show');
	loadNotes();
}); 



</script>