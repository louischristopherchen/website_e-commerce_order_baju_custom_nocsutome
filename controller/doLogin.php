<?php 
	include("doConnect.php");
	session_start();
	$username = $_REQUEST['txtUsername'];
	$password = $_REQUEST['txtPassword'];
	if ($username =="")
	{
		header("location:../login.php?errorMsg=Username Must be Filled");
	}
	else if ($password =="")
	{
		header("location:../login.php?errorMsg=Password Must be Filled");
	}
	else
	{
	$password = md5($password);
	$result = mysql_query("SELECT userID,role,username,password FROM msuser WHERE username = '$username' AND password = '$password'");
	$rows = mysql_num_rows($result);
		if(mysql_num_rows($result)<1)
		{
			header("location:../login.php?errorMsg=Username or Password invalid");

		}
		else
		{
			$result = mysql_fetch_array($result);
			$_SESSION['userRole']= $result['role'];
			$_SESSION['userID']= $result['userID'];
			$_SESSION['username']= $result['username'];
			header("location:../index.php");
		}	
	}

?>