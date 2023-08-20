<?php 
    if(isset($_GET['project-id'])){
        $id = $_GET['project-id'];

        $stmt2 = $db_con->query("SELECT * FROM tbl_subprojects where project_id=".$id);
        while ($row = $stmt2->fetch()) {           
            $id = $row['id'];
            $work_type = $row['work_type'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $progress = $row['progress'];
            
            echo '<table>
                    <tr>
                        <td style="width:50px;">'.$work_type.'</td>
                        <td style="width:10px;"><span class="badge badge-info">'.$progress.'%</span></td>
                        <td style="width:250px;"><span>'.$start_date.'-'.$end_date.'</span></td>
                        <td><a type="button" class="btn btn-sm btn-outline-primary" href="info.php?id='.$row['id'].'">info</a></td>
                    </tr>
                </table>';
         }
    }
?>