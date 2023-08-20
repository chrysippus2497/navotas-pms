<?php
//Add To do list

function projectCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT COUNT(id) as id FROM tbl_projects where status = "Active"');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo $row['id'];
}
function archivedprojectCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT COUNT(id) as id FROM tbl_projects where status = "Inactive"');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo $row['id'];
}

function subprojectCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT COUNT(id) as id FROM tbl_subprojects');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo $row['id'];
}

function materialCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT COUNT(id) as id FROM tbl_materials');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo $row['id'];
}

function employeeCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT COUNT(id) as id FROM tbl_employee where status="Hired"');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo $row['id'];
}

function archivedemployeeCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT COUNT(id) as id FROM tbl_employee where status="Inactive"');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo $row['id'];
}

function ongoingprojectCount() {
    include 'config.php';
    $st = $db_con->prepare('SELECT *, SUM(s.progress) as p, COUNT(s.id) as i FROM tbl_projects as p LEFT JOIN tbl_subprojects as s ON p.id=s.project_id where p.id = s.project_id GROUP BY p.id');
    $st->execute();
    while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
  
    echo '<div class="row">
    <div class="col-sm-3"><span class="text-secondary">&#8226;</span><span style="font-weight:normal;">'.$row['project_name'].'</span></div>
    
    <div class="col-sm-5"><progress id="file" value="'.round(($row['p']/$row['i']),2).'" max="100"></progress><span class="percentage">'.round(($row['p']/$row['i']),2).'%</span></div>
    </div>
    '
    ;
}
}

function latestproject() {
    include 'config.php';
    $st = $db_con->prepare('SELECT *, SUM(s.progress) as p, COUNT(s.id) as i FROM tbl_projects as p LEFT JOIN tbl_subprojects as s ON p.id=s.project_id order by p.id desc limit 1');
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    echo '<div style="margin-top:10px;"><span style="margin-left:65px;">Top Project: </span><span style="font-weight:normal;">'.$row['project_name'].'</span><span class="badge badge-primary ml-2">'.round(($row['p']/$row['i']),2).'%</span></div>';
}



if(isset($_GET['addNote']))
{
include 'config.php';

$date = date('M d, Y H:i a');

$sql = "INSERT INTO tbl_notes (title,note,user_id,date_created) VALUES(:title,:note,:user_id,:date_created)";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":title" => $_POST["title"],
    ":note" => $_POST["note"],
    ":user_id" => $_POST["user_id"],
    ":date_created" => $date


));
echo $a = $db_con->lastInsertId();
}

?>


<?php

if(isset($_GET['viewNote'])){

$conn = new PDO("mysql:host=localhost;dbname=pms", "root", "", array(
    PDO::ATTR_PERSISTENT => true
));
 
$sql = "SELECT * FROM tbl_notes ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
 
echo json_encode($result->fetchAll());
 
}
?>


<?php

 if(isset($_GET['loadNote'])){

$conn = new PDO("mysql:host=localhost;dbname=pms", "root", "", array(
    PDO::ATTR_PERSISTENT => true
));
 
$sql = "SELECT * FROM tbl_notes ORDER BY id DESC";
$result = $conn->query($sql);
 
echo json_encode($result->fetchAll());
 
}
?>

<?php
if(isset($_GET['deleteNote']))
{
include 'config.php';

$sql = "DELETE FROM tbl_notes WHERE id=:id AND user_id=:user_id";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":id" => $_POST["id"],
    ":user_id" => $_POST["user_id"]
));
echo json_encode($result->fetchAll());
}

?>



<?php

if(isset($_GET['loadSubProject'])){

$conn = new PDO("mysql:host=localhost;dbname=pms", "root", "", array(
    PDO::ATTR_PERSISTENT => true
));
 
$sql = "SELECT * FROM tbl_subprojects WHERE project_id = ".$_GET['project-id']."";
$result = $conn->query($sql);
 
echo json_encode($result->fetchAll());
 
}
?>

<?php

 if(isset($_GET['viewNewSubProject'])){

$conn = new PDO("mysql:host=localhost;dbname=pms", "root", "", array(
    PDO::ATTR_PERSISTENT => true
));
 
$sql = "SELECT * FROM tbl_subprojects WHERE project_id = ".$_GET['project-id']." ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
 
echo json_encode($result->fetchAll());
 
}
?>

<?php

 if(isset($_GET['loadPercent'])){

$conn = new PDO("mysql:host=localhost;dbname=pms", "root", "", array(
    PDO::ATTR_PERSISTENT => true
));
 
$sql = "SELECT SUM(progress) as p, COUNT(id) as i FROM tbl_subprojects where project_id=".$_GET['project-id']."";
$result = $conn->query($sql);
 
echo json_encode($result->fetchAll());
 
}
?>

<?php

 if(isset($_GET['loadPercent2'])){

$conn = new PDO("mysql:host=localhost;dbname=pms", "root", "", array(
    PDO::ATTR_PERSISTENT => true
));
 
$sql = "SELECT SUM(progress) as p, COUNT(id) as i FROM tbl_subprojects where project_id=".$_GET['project-id']."";
$result = $conn->query($sql);

echo json_encode($result->fetchAll());
 
}
?>




<?php
//Add Project
if(isset($_GET['addProject']))
{
include 'config.php';


$date1 = date_create($_POST["start_date"]);
$start_date = date_format($date1, 'M d, Y');

$date2 = date_create($_POST["end_date"]);
$end_date = date_format($date2, 'M d, Y');

$sql = "INSERT INTO tbl_projects (project_type, project_name, client_name, client_contact, 
location, cost, start_date, end_date, team_assigned, added_by ) 
VALUES(:project_type, :project_name, :client_name, :client_contact, 
:location, :cost, :start_date, :end_date, :team_assigned, :added_by)";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":project_type" => $_POST["project_type"],
    ":project_name" => $_POST["project_name"],
    ":client_name" => $_POST["client_name"],
    ":client_contact" => $_POST["client_contact"],
    ":location" => $_POST["location"],
    ":cost" => $_POST["cost"],
    ":start_date" => $start_date,
    ":end_date" => $end_date,
    ":team_assigned" => $_POST["team_assigned"],
    ":added_by" => $_POST["added_by"]
));
echo $a = $db_con->lastInsertId();
}

?>



<?php

 if(isset($_GET['loadProjects'])){
    include 'config.php';

    $result = $db_con->query("SELECT * from tbl_projects");
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        if($row['status']=="Active")
        {
         $status = '<span class="badge badge-success badge-sm">'.$row['status'].'</span>';
        }
        else{
          $status = '<span class="badge badge-danger badge-sm">'.$row['status'].'</span>';

        }
         echo '<tr style="background-color:white;">';
         echo '<td>'.$row['project_name'].'</td>';
         echo '<td>'.$row['location'].'</td>';
         echo '<td>'.$row['start_date'].'</td>';
         echo '<td>'.$row['end_date'].'</td>';
         echo '<td>'.$status.'</td>';
         echo '<td><button id="todo-btn" class="btn btn-sm btn-outline-dark" href="#viewProjectModal" role="button" data-bs-toggle="modal"><i class="fas fa-search"></i> View Project</button></td>';
         echo '<tr>';
      }


}



?>



<?php
//Add To do list
if(isset($_GET['addSubProject']))
{
include 'config.php';
$progress = 0;

$date1 = date_create($_POST["start_date"]);
$start_date = date_format($date1, 'M d, Y');
$syy = date_format($date1, 'Y');
$smm = date_format($date1, 'm');
$sdd = date_format($date1, 'd');

$date2 = date_create($_POST["end_date"]);
$end_date = date_format($date2, 'M d, Y');
$eyy = date_format($date2, 'Y');
$emm = date_format($date2, 'm');
$edd = date_format($date2, 'd');

$sql = "INSERT INTO tbl_subprojects (project_id, work_type, start_date, end_date, team_assigned, added_by, progress, syy, smm, sdd, eyy, emm, edd) 
VALUES(:project_id, :work_type, :start_date, :end_date, :team_assigned, :user_id, :progress, :syy, :smm, :sdd, :eyy, :emm, :edd)";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":project_id" => $_POST["project_id"],
    ":work_type" => $_POST["work_type"],
    ":start_date" => $start_date,
    ":end_date" => $end_date,
    ":team_assigned" => $_POST["team_assigned"],
    ":user_id" => $_POST["user_id"],
    ":progress" => $progress,
    ":syy" => $syy,
    ":smm" => $smm,
    ":sdd" => $sdd,
    ":eyy" => $eyy,
    ":emm" => $emm,
    ":edd" => $edd
));
echo $a = $db_con->lastInsertId();
}

?>



<?php

//fetch.php
if(isset($_GET['fetchProgress'])){
include('config.php');

$column = array("work_type", "progress", "start_date", "end_date");
$query = "SELECT * FROM tbl_subprojects WHERE project_id = ".$_GET['project-id']."";



$query1 = '';
$statement = $db_con->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $db_con->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = '<b>'.$row['work_type'].'</b>';
 $sub_array[] = $row['progress'].'%';
 $sub_array[] = $row['start_date'].'-'.$row['end_date'];

 $data[] = $sub_array;
}

function count_all_data($db_con)
{
 $query = "SELECT * FROM tbl_subprojects WHERE project_id = ".$_GET['project-id']."";
 $statement = $db_con->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($db_con),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);
}


if(isset($_GET['UpdateProgress'])){
include('config.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':progress'  => $_POST['progress'],
  ':work_type'    => $_POST['work_type']
 );

 $query = "
 UPDATE tbl_subprojects 
 SET progress = :progress
 WHERE work_type = :work_type
 ";
 $statement = $db_con->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}



}
?>

<?php
//Add To do list
if(isset($_GET['addMaterials']))
{
include 'config.php';

$status ="Active";

$sql = "INSERT INTO tbl_materials (name, subproject_id, brand, unit, quantity, status, added_by) 
VALUES(:name, :subproject_id, :brand, :unit, :quantity, :status, :added_by)";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":name" => $_POST["name"],
    ":subproject_id" => $_POST["subproject_id"],
    ":brand" => $_POST["brand"],
    ":unit" => $_POST["unit"],
    ":quantity" => $_POST["quantity"],
    ":status" => $_POST["status"],
    ":added_by" => $_POST["added_by"],

));
echo $a = $db_con->lastInsertId();
}

?>


<?php
//Edit Materials
if(isset($_GET['editMaterials']))
{
include 'config.php';

$sql = "UPDATE tbl_materials set name=:name, brand=:brand, unit=:unit, quantity=:quantity WHERE id=:id";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":name" => $_POST["name"],
    ":brand" => $_POST["brand"],
    ":unit" => $_POST["unit"],
    ":quantity" => $_POST["quantity"],
    ":id" => $_POST["id"]


));
echo $a = $db_con->lastInsertId();
}

?>

<?php
//Edit Employee
if(isset($_GET['editEmployee']))
{
session_start();
include 'config.php';
if($_POST['confirm_password']==$_SESSION['password']){

$sql = "UPDATE tbl_employee set firstname=:firstname, middlename=:middlename, lastname=:lastname, birthday=:birthday,
 address=:address, marital_status=:marital_status, position=:position, team_assigned=:team_assigned WHERE id=:id";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":firstname" => $_POST["firstname"],
    ":middlename" => $_POST["middlename"],
    ":lastname" => $_POST["lastname"],
    ":birthday" => $_POST["birthday"],
    ":address" => $_POST["address"],
    ":marital_status" => $_POST["marital_status"],
    ":position" => $_POST["position"],
    ":team_assigned" => $_POST["team_assigned"],
    ":id" => $_POST["id"]
));
}
else{
    echo 'Wrong Password';
}
echo $a = $db_con->lastInsertId();
}

?>

<?php
//Add Employee
if(isset($_GET['addEmployee']))
{
include 'config.php';

$status="Hired";

$sql = "INSERT INTO tbl_employee (firstname, middlename, lastname, birthday, 
address, marital_status, position, team_assigned, hired_date, added_by, status ) 
VALUES(:firstname, :middlename, :lastname, :birthday, 
:address, :marital_status, :position, :team_assigned, :hired_date, :added_by, :status)";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":firstname" => $_POST["firstname"],
    ":middlename" => $_POST["middlename"],
    ":lastname" => $_POST["lastname"],
    ":birthday" => $_POST["birthday"],
    ":address" => $_POST["address"],
    ":marital_status" => $_POST["marital_status"],
    ":position" => $_POST["position"],
    ":team_assigned" => $_POST["team_assigned"],
    ":hired_date" => $_POST["hired_date"],
    ":added_by" => $_POST["added_by"],
    ":status" => $status
));
echo $a = $db_con->lastInsertId();
}

?>

<?php
//Edit Deployment
if(isset($_GET['editDeployment']))
{
include 'config.php';

$sql = "UPDATE tbl_employee set project_id=:project_id, subproject_id=:subproject_id WHERE id=:id";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":project_id" => $_POST["project_id"],
    ":subproject_id" => $_POST["subproject_id"],
    ":id" => $_POST["id"]
));

echo $a = $db_con->lastInsertId();
}


//archive
if(isset($_GET['a'])){
include 'config.php';
$status ="Inactive";
$sql = "UPDATE tbl_employee set status=:status WHERE id=:id";
$result = $db_con->prepare($sql);
$result->execute(array(
    ":status" => $status,
    ":id" => $_GET["a"]
));

header("Location:../archived_employee.php?a=1");


}


//restore
if(isset($_GET['r'])){
include 'config.php';
$status ="Hired";
    $sql = "UPDATE tbl_employee set status=:status WHERE id=:id";
    $result = $db_con->prepare($sql);
    $result->execute(array(
        ":status" => $status,
        ":id" => $_GET["r"]
    ));
    
    header("Location:../employee.php?r=1");
}


if(isset($_GET['ap'])){
    include 'config.php';
    $status ="Inactive";
        $sql = "UPDATE tbl_projects set status=:status WHERE id=:id";
        $result = $db_con->prepare($sql);
        $result->execute(array(
            ":status" => $status,
            ":id" => $_GET["ap"]
        ));
        
        header("Location:../archived_project.php?a=1");
    }

if(isset($_GET['rp'])){
        include 'config.php';
        $status ="Active";
            $sql = "UPDATE tbl_projects set status=:status WHERE id=:id";
            $result = $db_con->prepare($sql);
            $result->execute(array(
                ":status" => $status,
                ":id" => $_GET["rp"]
            ));
            
            header("Location:../project.php?r=1");
        }
?>