<?php
namespace pms;
session_start();
if(empty($_SESSION['id'])){

header('location: ../../index.php');	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../vendor/charts/loader.js"></script>
<script type="text/javascript" src="js/gantt-chart.js"></script>
<link rel="stylesheet" type="text/css" href="../vendor/datatables/datatables.min.css" />
<script src="../vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../vendor/datatables/dataTables.min.js"></script>
<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
<script type="text/javascript" src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../vendor/tabledit/tabledit.min.js"></script>
</head>