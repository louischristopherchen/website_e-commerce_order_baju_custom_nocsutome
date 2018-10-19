<?php
	include('doConnect.php');
	session_start();
	$username = $_REQUEST['txtUsername'];
	$password = $_REQUEST['txtPassword'];
	$conPassword = $_REQUEST['txtConfirmPassword'];
	$email = $_REQUEST['txtEmail'];
	$gender = $_REQUEST['gender'];
	$phone = $_REQUEST['txtPhone'];
	$address = $_REQUEST['txtAddress'];
	$address = nl2br($address);
	
	
	setcookie('cookieUsername',$username,time()+300,'/');
	setcookie('cookiePassword',$password,time()+300,'/');
	setcookie('cookieConPassword',$conPassword,time()+300,'/');
	setcookie('cookieEmail',$email,time()+300,'/');
	setcookie('cookiePhone',$phone,time()+300,'/');
	setcookie('cookieAddress',$address,time()+300,'/');

	
	
	$existUsername = mysql_query("select userid from msuser where username = '$username'");
	
	if ($username=="")
	{
		header("location:../register.php?errorMsg=Username Must be Filled");
	}
	else if (strlen($username)<6 || strlen($username)>25)
	{
		header("location:../register.php?errorMsg=Username Must Contain 6 - 25 Characters");
		setcookie('cookieUsername',"",time()+300,'/');
	}
	else if(mysql_num_rows($existUsername)>0)
	{
		header("location:../register.php?errorMsg=Username Already Exist");
		setcookie('cookieUsername',"",time()+300,'/');
	}
	else if ($password=="")
	{
		header("location:../register.php?errorMsg=Password Must be Filled");
	}
	else if (strlen($password)<6)
	{
		header("location:../register.php?errorMsg=Password Must be More than 6 Characters");
		setcookie('cookiePassword',"",time()+300,'/');
	}
	else if ($conPassword=="")
	{
		header("location:../register.php?errorMsg=Confirm Password Must be Filled");
		setcookie('cookieConPassword',"",time()+300,'/');
	}
	else if ($conPassword!=$password)
	{
		header("location:../register.php?errorMsg=Confirm Password Must Match with the Password");
		setcookie('cookieConPassword',"",time()+300,'/');
	}
	else if ($email=="")
	{
		header("location:../register.php?errorMsg=Email Must be Filled");
	}
	else if (filter_var($email, FILTER_VALIDATE_EMAIL)!=true)
	{
		header("location:../register.php?errorMsg=Email Must Use Valid Email Format");
		setcookie('cookieEmail',"",time()+300,'/');
	}
	else if ($gender=="")
	{
		header("location:../register.php?errorMsg=Gender Must be Chosen");
	}
	else if ($phone=="")
	{
		header("location:../register.php?errorMsg=Phone Must be Filled");
	}
	else if (filter_var($phone, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../register.php?errorMsg=Phone Must Only Contain Number");
		setcookie('cookiePhone','',time()+300,'/');
	}
	else if ($address=="")
	{
		header("location:../register.php?errorMsg=Address Must be Filled");
	}
	
	else
		{
		 $password = md5($password);
		 $result = mysql_query("select userid from msuser");
		 mysql_query("insert into msuser values('','member','$username','$password','$email','$gender','$phone','$address')");
		header("location:../login.php");
		setcookie('cookieUsername',"",time()+300,'/');
		setcookie('cookiePassword',"",time()+300,'/');
		setcookie('cookieConPassword',"",time()+300,'/');
		setcookie('cookieAddress',"",time()+300,'/');
		setcookie('cookiePhone',"",time()+300,'/');
		setcookie('cookieEmail',"",time()+300,'/');
	}
		

?>