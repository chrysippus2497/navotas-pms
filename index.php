<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    <title></title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript"src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"src="vendor/sweetalert/sweetalert.js"></script>

  </head>
<body>
<div class="header bg-dark bg-gradient">
      <div class="logodiv"><a style="text-decoration:none; color:white;" href="index.php"> FFJJ Construction | Project Management System </a></div>
  </div>


<div style="margin-top:100px;" class="row">

  <div class="col">
  <div class="container mt-4 col col-lg-8 float-right text-justify">
    <img class="img-fluid mx-auto d-block" src="images/logo.jpg" style="width:50px;">
    <h5 class="text-center">FFJJ Construction | PMS</h5>
    <p>This system is a project management system used for construction firms, it can efficiently manage your construction projects, employees and provide back-up for data security.</p>
    <p>The system can only be used by the administrator of FFJJ Construction.</p>
    <p>To access the system please provide your account details in the login form.</p>
  </div>

  </div>

  <div class="col">

  <div class="container col col-lg-8 float-left">
<div class="card mt-5 mx-auto shadow-sm  bg-white rounded">
  <div class="card-header text-center">
    Sign In
  </div>
  <div class="card-body text-center">
  <form name="log-in-form" id="log-in-form" method="post">

   <div class="alert alert-danger" style="font-size:12px;" id="error-msg"></div>    
   <div class="alert alert-success" id="success-msg"></div>	

   <div class="form-group row">
    <label class="col-sm-3 pt-1"><small>Username:</small></label>
    <div class="input-group input-group-sm mb-2 col-sm-9">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
    </div>
   </div>


   <div class="form-group row">
    <label  class="col-sm-3 pt-1"><small>Password:</small></label>
    <div class="input-group input-group-sm mb-2 col-sm-9">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    </div>
   </div>
   

    <button  class="btn btn-outline-primary btn-sm" id="log-in">Sign In</button>
    </form>

  </div>
</div>
</div>
  </div>

</div>
<div class="hr">
<hr style="width:900px;" class="mx-auto">
</div>
<div class="row">
  <div class="col">
  <div class="container col col-lg-8 float-right text-justify">
  <p>Web-Based FFJJ Project Management System</p>
</div>
  </div>
  <div class="col">
  <div style="padding-left:30px;" class="container col col-lg-6 float-right text-justify">
  <p> 2022-2023 </p>
  </div>
  </div>
</div>


</body>
</html>
<script src="admin/js/jquery-1.7.2.min.js"></script>
<script src="admin/js/bootstrap.js"></script>
<script src="admin/js/login.js"></script>

