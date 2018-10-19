<?php 
	include("doConnect.php");
	session_start();
	
	$nomor = $_REQUEST['txtNomor'];
	$pertanyaan = $_REQUEST['txtPertanyaan'];
	$jawaban =$_REQUEST['txtJawaban'];
	$pertanyaan = nl2br($pertanyaan);
	$jawaban= nl2br($jawaban);
	setcookie('cookieNomor',$nomor,time()+300,'/');
	setcookie('cookiePertanyaan',$pertanyaan,time()+300,'/');
	setcookie('cookieJawaban',$jawaban,time()+300,'/');
	
	if ($nomor=="")
	{
		header("location:../insertfaq.php?errorMsg=Nomor Must be Filled$result");
		setcookie('cookieNomor','',time()+300,'/');
	}
	else if (filter_var($nomor, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../insertfaq.php?errorMsg=Number Must Only Contain Number");
		setcookie('cookiePertanyaan','',time()+300,'/');
	}
	else if ($pertanyaan=="")
	{
		header("location:../insertfaq.php?errorMsg=Question Must be Filled");
		setcookie('cookieJawaban','',time()+300,'/');
	}
	
	else if ($jawaban=="")
	{
		header("location:../insertfaq.php?errorMsg=Answer Must be Filled");
		setcookie('cookieJawaban','',time()+300,'/');
	}
	else
	{
				$userID = $_SESSION['userID'];
				mysql_query("insert into faq values('','$userID','$nomor','$pertanyaan','$jawaban')");	
				setcookie('cookieNomor','',time()+300,'/');
				setcookie('cookieJawaban','',time()+300,'/');
				setcookie('cookiePertanyaan',"",time()+300,'/');
				header("location:../faq.php");				

	}
	
?>