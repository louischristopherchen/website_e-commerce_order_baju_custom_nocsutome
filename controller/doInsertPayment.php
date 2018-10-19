<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$norek=$_REQUEST['txtNorek'];
	$paymentID=$_REQUEST['paymentID'];
	$NamaP = $_REQUEST['txtNamaP'];
	$NamaB = $_REQUEST['txtNamaB'];
	$JlhTrf =$_REQUEST['txtJlhTrf'];
	setcookie('cookieNamaPengirim',$NamaP,time()+300,'/');
	setcookie('cookieNamaBank',$NamaB,time()+300,'/');
	setcookie('cookieJlhTrf',$JlhTrf,time()+300,'/');
	setcookie('cookieNorek',$norek,time()+300,'/');
	if ($NamaP=="")
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=Nama Pengirim Must be Filled$result");
		setcookie('cookieNamaPengirim','',time()+300,'/');
	}
	else if ($NamaB=="")
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=Nama Bank Must be Filled$result");
		setcookie('cookieNamaBank','',time()+300,'/');
	}
	else if ($JlhTrf=="")
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=Jumlah Transfer Must be Filled");
		setcookie('cookieJlhTrf','',time()+300,'/');
	}
	else if (filter_var($JlhTrf, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=Jumlah Transfer Must Only Contain Number");
		setcookie('cookieJlhTrf','',time()+300,'/');
	}
	else if($JlhTrf<0)
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=Jumlah Transfer Must Be Greater than 0");
		setcookie('cookieJlhTrf','',time()+300,'/');
	}
	else if ($norek=="")
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=No Rek Must be Filled");
		setcookie('cookieNorek','',time()+300,'/');
	}
	else if (filter_var($norek, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=No Rek Must Only Contain Number");
		setcookie('cookieNorek','',time()+300,'/');
	}
	else if($norek<99999999)
	{
		header("location:../insertpayment.php?transactionID=$transactionID&&paymentID=$paymentID&&errorMsg=No Rek minimum 9 digit");
		setcookie('cookieNorek','',time()+300,'/');
	}
	else
	{

							
		mysql_query("update trpayment set nama_payment='$NamaP',nama_bank='$NamaB', nilai_transfer='$JlhTrf', status_payment='process', norek='$norek' where paymentID=$paymentID");	
		setcookie('cookieNamaPengirim','',time()+300,'/');
		setcookie('cookieNamaBank','',time()+300,'/');
		setcookie('cookieJlhTrf',"",time()+300,'/');
		setcookie('cookieNorek',"",time()+300,'/');
		header("location:../payment.php");				

	}
	
?>