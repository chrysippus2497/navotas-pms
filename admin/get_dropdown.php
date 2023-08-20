<?php
namespace pms;

use pms\dropdown;
if (! empty($_POST["project_id"])) {
    
    $projectId = $_POST["project_id"];
    
    include 'dropdown.php';
    $dropDown = new dropdown();
    $subprojectResult = $dropDown->getSubprojectByProjectId($projectId);
    ?>
<option value="">Select sub-project</option>
<?php
    foreach ($subprojectResult as $subproject) {
        ?>
<option value="<?php echo $subproject["id"]; ?>"><?php echo $subproject["work_type"]; ?></option>
<?php
    }
}
?>