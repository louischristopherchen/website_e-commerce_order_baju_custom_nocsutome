<?php 
	include("doConnect.php");
	session_start();
	$faqID = $_REQUEST['faqID'];
	$nomor = $_REQUEST['txtNomor'];
	$pertanyaan = $_REQUEST['txtPertanyaan'];
	$jawaban =$_REQUEST['txtJawaban'];
	$pertanyaan = nl2br($pertanyaan);
	$jawaban= nl2br($jawaban);
	
	if ($nomor=="")
	{
		header("location:../updatefaq.php?faqID=$faqID&errorMsg=Nomor Must be Filled$result");
	
	}
	else if (filter_var($nomor, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../updatefaq.php?faqID=$faqID&errorMsg=Number Must Only Contain Number");

	}
	else if ($pertanyaan=="")
	{
		header("location:../updatefaq.php?faqID=$faqID&errorMsg=Question Must be Filled");

	}
	
	else if ($jawaban=="")
	{
		header("location:../updatefaq.php?faqID=$faqID&errorMsg=Answer Must be Filled");
	
	}
	else
	{
				$userID = $_SESSION['userID'];
				
				mysql_query("update faq set nomorfaq='$nomor', pertanyaanfaq='$pertanyaan',
							jawabanfaq='$jawaban'where faqID=$faqID");			
				header("location:../updatefaq.php?faqID=$faqID&errorMsg=Success");
	}
	
?>