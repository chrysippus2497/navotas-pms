<?php 
if(isset($_GET['project-id'])){
        $id = $_GET['project-id'];
        $stmt = $db_con->query("SELECT * FROM tbl_projects where id=".$id);
             
        while ($row = $stmt->fetch()) {           
            $project_name = $row['project_name'];
            $project_type = $row['project_type'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $location = $row['location'];
            $cost = $row['cost'];
            $team_assigned = $row['team_assigned'];
            $client_name = $row['client_name'];
            $client_contact = $row['client_contact'];      
        
        }
    }
?>

    <li>Project Name: <?php echo $project_name;?> </li>
    <li>Project Type: <?php echo $project_type;?></li>
    <li>Starting Date: <?php echo $start_date;?></li>
    <li>End Date: <?php echo $end_date;?></li>
    <ul>

    </div>
    <div class="col">
        <ul class="list-unstyled">
            <li class="mt-4 pt-3">Location: <?php echo $location;?> </li>
            <li>Cost: <?php echo number_format($cost).' PHP';?></li>
            <li>Team Assigned: <?php echo $team_assigned;?></li>
            <li>Client Name: <?php echo $client_name;?> </li>
            <li>Client Contact: <?php echo $client_contact;?> </li>
        <ul>
    </div></div><hr><br>
                
            
 <!--Overall Progress-->
    <div class="row">
        <div class="col">
            <h6 class="mb-3">Overall Progress: <span class="mt-2"><span id="data4"></span></span> <span class="ml-3"><button class="btn btn-outline-primary btn-sm" href="#viewSubProjectModal" role="button" data-bs-toggle="modal">Update Progress</button></span></h6>
            <h6>Sub-Project Progress: <span class="ml-4 pl-3"><button class="btn btn-outline-primary btn-sm" href="#addSubProjectModal" role="button" data-bs-toggle="modal">Add sub-project</button></span></h6>
    

            <style>
                table, tr, td {
                    border: none;
                }
            </style>