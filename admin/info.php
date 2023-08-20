<?php include 'includes/top.php';
include 'includes/sidebar.php';
include 'includes/header.php';
include 'includes/config.php';
$stmt = $db_con->query("SELECT * from tbl_subprojects as s LEFT JOIN 
tbl_projects as p ON s.project_id = p.id where s.id=".$_GET['id']."");
while ($row = $stmt->fetch()) {   
$ta = $row['team_assigned'];
$wt = $row['work_type'];
$pn = $row['project_name'];
}

?>
<title></title>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


<style>


</style>
<body>
<div class="container" id="main">
<h5><?php echo $pn;?><button id="todo-btn" class="btn btn-sm btn-outline-dark" style="float:right;" href="#addMaterialModal" role="button" data-bs-toggle="modal"><i class="fas fa-boxes"></i> Add Materials</button></h5><hr>



<div id="card-size3" class="card mt-5 mx-auto shadow-sm bg-white rounded" style="width:70rem">
  <div class="card-header text-left">
  <?php echo $wt;?>
  </div>

  <!--table-->
  <div class="card-body">
  <h6>Team/Group Assigned: <?php echo $ta;?></h6><hr>
  
  <th><b>Materials Used</b></th>
 

  <table class="table table-bordered table-hover materialsTable" id="materialsTable" width="100%" cellspacing="0">
      <thead>
      <tr>
          <th hidden scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Brand</th>
          <th scope="col">Unit</th>
          <th scope="col">Quantity</th>
          <th scope="col"></th>

      </tr>
      </thead><tbody>                 
          <?php
          $stmt = $db_con->query("SELECT * FROM tbl_materials where subproject_id=".$_GET['id']."");
          while ($row = $stmt->fetch()) {      
              echo '<td hidden>'.$row['id'].'</td>';     
              echo '<td>'.$row['name'].'</td>';
              echo '<td>'.$row['brand'].'</td>';
              echo '<td>'.$row['unit'].'</td>';
              echo '<td>'.$row['quantity'].'</td>';
              echo '<td><button type="button" class="btn btn-outline-dark btn-sm editMaterial"><i class="fas fa-edit"></i> Edit Material</button></td>';
            
            echo '</tr>';
          }

?>
</tbody></table>
 
 
 
 

   </div>
   <div style="height:70px;">
          
   </div>
</div>



</div>
<script type="text/javascript" src="js/sidebar.js"></script>


</body>
</html> 
<script type="text/javascript">
  //Datatable
    $(document).ready(function(){
      $('#materialsTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
      { extend: 'print', text: '<i class="fas fa-print"></i> Print Material Used', title: '<?php echo '<h5 style="font-family:poppinsmedium">'.$pn.':<span style="font-family:poppinsmedium"> '.$wt.'</span></h5>';?>',
        customize: function ( win ) {
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-family', 'poppinsmedium' );
                }
      },
      { extend: 'excel', text: '<i class="fas fa-file-alt"></i> Excel' },
      { extend: 'pdf', text: '<i class="fas fa-file-alt"></i> PDF' },
    ]
      });
    });
  //Success
    $("#success-alert").fadeTo(3000, 600).slideUp(600, function(){
    $("#success-alert").slideUp(600);
    });
    
    $(document).ready(function(){
    $('.editMaterial').on('click',function(){
        $('#editMaterialModal').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();
        }).get();
        console.log(data);
    $('#id1').val(data[0]);
    $('#name1').val(data[1]);
    $('#brand1').val(data[2]);
    $('#unit1').val(data[3]);
    $('#quantity1').val(data[4]);

    });
  });

</script>
<?php 
include '../modal.php';
?>