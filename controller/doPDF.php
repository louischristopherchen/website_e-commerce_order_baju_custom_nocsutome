<?php
		include("doConnect.php");
		$result = mysql_query("select u.username, t.transactionID, t.date , t.status, d.productID, d.quantity,p.image,p.productname,p.price from msuser as u, trtransaction as t,detailtransaction as d , msproduct as p where t.transactionID=d.transactionID and d.productID = p.productID and t.userID=u.userID");
		
		
		require("../fpdf.php");
	
		
		
		class PDF extends FPDF {
		 
			function Header() {
				$this->SetFont('Times','',12);
				$this->SetY(0.25);
				$this->Cell(0, .25, "Transaction Report ".$this->PageNo(), 'T', 2, "R");
				//reset Y
				$this->SetY(1);
			}
			 
			function Footer() {
			//This is the footer; it's repeated on each page.
			//enter filename: phpjabber logo, x position: (page width/2)-half the picture size,
			//y position: rough estimate, width, height, filetype, link: click it!
			   // $this->Image("logo.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.phpjabbers.com");
			}
		 
		}
		 
		//class instantiation
		$pdf=new PDF("P","in","Letter");
		 
		$pdf->SetMargins(1,1,1);
		 
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		 $lipsum1="";
		 $id="";
		 while($row = mysql_fetch_array($result))
		{
			$transactionID=$row['transactionID'];
			$username = $row['username'];
			$date = $row['date'];
			$status=$row['status'];
		
			$image= $row['image'];
			$productname = $row['productname'];
			$price = $row['price'];
			$quantity = $row['quantity'];
			$total=$price*$quantity;
			
			if($id!=$transactionID)
			{
				$lipsum1.="TransactionID: $transactionID | Username: $username | Status: $status | Total: IDR.$total \n";
				$lipsum2="";  
				$lipsum3 ="";
			}
			$id=$transactionID;
	
		}
		
			  
			$pdf->SetFillColor(240, 100, 100);
			$pdf->SetFont('Times','BU',12);
			  
			//Cell(float w[,float h[,string txt[,mixed border[,
			//int ln[,string align[,boolean fill[,mixed link]]]]]]])
			$pdf->Cell(0, .25, "Transaction", 1, 2, "C", 1);
			  
			$pdf->SetFont('Times','',12);
			//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
			$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
			$pdf->MultiCell(0, 0.25, $lipsum2, 1, "R");
			$pdf->MultiCell(0, 0.15, $lipsum3, 'B', "J");
			 
			
			  
			$pdf->Output();
		
?>