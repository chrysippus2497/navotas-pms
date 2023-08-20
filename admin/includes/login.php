<?php
	include_once('config.php');
		$error  = array();
		$res    = array();
		$success = "";

		if(empty($_POST['username']))
		{
			$error[] = "username field is required";	
		}
	
		if(empty($_POST['password']))
		{
			$error[] = "Password field is required";	
		}
	
		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
	    $statement = $db_con->prepare("select * from tbl_admin where username = :username AND password = :password" );
        $statement->execute(array(':username' => $_POST['username'],'password'=> $_POST['password']));
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($row)>0)
		{
		  session_start();
		  $_SESSION['id'] = $row[0]['id'];
		  $_SESSION['password'] = $_POST['password'];

		  $resp['redirect']    = "admin/index.php";
		  $resp['status']      = true;	
		  echo json_encode($resp);
		  exit;	
		}
		else
		{
		   $error[] = "username and password does not match";
		  $resp['msg']    = $error;
		  $resp['status']      = false;	
		  echo json_encode($resp);
		  exit;	
		} 


?>