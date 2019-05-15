<?php
//PDF USING MULTIPLE PAGES
//FILE CREATED BY: Carlos Jos้ Vแsquez Sแez
//YOU CAN CONTACT ME: carlos@magallaneslibre.com
//FROM PUNTA ARENAS, MAGALLANES
//INOVO GROUP - http://www.inovo.cl
//include_once "../global0.php";
define('FPDF_FONTPATH','../pdf/font/');
require('../pdf/fpdf_thai.php');
//  เรียก class จาก class หลัก
	///////////		include("../includes/prb.php"); 
	//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "tumect";	//ชื่อฐานข้อมูล
$tblname = "web_addnew";	//ชื่อตาราง


$datatitle = 'คำร้องทั่วไป';
// เริ่มติดต่อฐานข้อมูล
$connect = mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET NAMES tis620");
// เลือกฐานข้อมูล
$db = mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("ส่งคิวรีไม่ได้");

$result = mysql_fetch_array($dbquery);
		$id = $result[id];
		$date = $result[date];
		$month  = $result[month ];
		$year  = $result[year ];
		$type  = $result[type ];
		$title  = $result[title ];
		$titleone   = $result[titleone];
		$nameone   = $result[nameone];
		$idname   = $result[idname];
		$saka   = $result[saka];
		$pa   = $result[pa];
		$class   = $result['class'];
		$room   = $result[room];
		$detail   = $result[detail];
		$idcard   = $result[idcard];
		$hand   = $result[hand];
		$status   = $result[status];
  //////////////////*/*/*/*/*/*/*/*/*/*/*/*/*/*///////////////*****************///////////////
			//	$ObjPa  = new pa();

					///--Show data		
				//include "prb.php"; 
class PDF extends FPDF_TH
{
	//Page header
	function Header()
	{
		//Logo
		//$this->Image('../picture/logo_head.jpg',10,8,8);
		//AngsanaNew bold 15
		$this->SetFont('AngsanaNew','B',15);
		//Move to the right
		$this->SetY(3);
		$this->SetX(5);
		//Title
		//$this->TCell(0,0,$GLOBALS["COLLEGENAME"],0,0,'L');
		$this->SetX(-10);
		$this->SetFontSize(12);
		$this->TCell(0,0,' ',0,0,'R');
		$this->Ln(5);
		
		$this->SetX(5);
		$this->SetFontSize(12);
	}

	//Page footer
	function Footer()
	{
		//Position at 3.0 cm from bottom
		//$this->SetLineWidth(0.2);
		//$this->Line(5,200,350,200);
		$this->SetY(-10);
		$this->SetFont('AngsanaNew','',12);
		//Page number
		//$this->TCell(0,0,'Page '.$this->PageNo().'/{nb}',0,0,'R');
		$this->SetY(-10);
		//$this->TCell(0,0,'Date Print : '.date("d/m/y H:i:m "),0,0,'L');
	}
} //End class



//Create new pdf file
$pdf=new PDF('P','mm','A4');

//Set thai font
$pdf->SetThaiFont();

$pdf->AliasNbPages();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
//$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 22;

//Set Row Height
$row_height = 6;
$row_height1 = 3;	
$pdf->SetFontSize(16);
$pdf->TCell(105);
				
				
		

		
			
			$pdf->AddPage();
			
			//Go to next row
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(135);
									$pdf->TCell(100,4,$datatitle,0,0,'L',0);


			//Go to next row
			$y_axis = $y_axis+($row_height*3)+6;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(80);
									$pdf->TCell(100,5,$namecut,0,0,'L',0);


			//Go to next row
			$y_axis = $y_axis+$row_height;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(80);
									$pdf->TCell(50,5,$address,0,0,'L',0);
/////////////////////////////////////////////////////////////////////////
	
			//Go to next row
			
			$y_axis = $y_axis+$row_height+13;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(83);
										$pdf->TCell(42,5,$date1,0,0,'L',0);
										//
									$pdf->TCell(40,5,$timeline,0,0,'L',0);
									//
									$pdf->TCell(30,5,$date2,0,0,'L',0);
									//
									
///////////////////////////////////////////////////////////////////////////////////////
	//Go to next row
			$y_axis = $y_axis+$row_height+15;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(18,5,$idcar,0,0,'L',0);
								
								   $pdf->TCell(40,5,$namecar,0,0,'L',0);
									
									$pdf->TCell(40,5,$codecar,0,0,'L',0);
								 
								 $pdf->TCell(45,5,$codetank,0,0,'L',0);

								   $pdf->TCell(35,5,$desiretank,0,0,'L',0);
								   
								      $pdf->TCell(20,5,$sizetank,0,0,'L',0);
///////////////////////////////////////////////////////////////////////////////////////
				//Go to next row
			$y_axis = $y_axis+($row_height*8)+15;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(26);
									// 
								$pdf->TCell(63,5,number_format($number,2,'.',' '),0,0,'L');
									//
								 $pdf->TCell(33,5,number_format($allnumber,2,'.',' '),0,0,'L');
									//
								$pdf->TCell(30,5,$rkon,0,0,'L');
									 //
							 $pdf->TCell(30,5,number_format($vat,2,'.',' '),0,0,'L');
									 //
							  $pdf->TCell(35,5,number_format($sum,2,'.',' '),0,0,'L');
///////////////////////////////////////////////////////////////////////////////////////
					//Go to next row
			$y_axis = $y_axis_initial+$row_height+154;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(45);
									$pdf->TCell(108,5,$date3,0,0,'L',0);
									//	
									$pdf->TCell(100,5,$date4,0,0,'L',0);
///////////////////////////////////////////////////////////////////////////////////////
		//Go to next row
			$y_axis = $y_axis_initial+$row_height+206;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(89);
									$pdf->TCell(77,5,$codecar,0,0,'L',0);
									//	
									$pdf->TCell(100,5,$codetank,0,0,'L',0);
///////////////////////////////////////////////////////////////////////////////////////
				//Go to next row
			$y_axis = $y_axis_initial+$row_height+220;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(40);
									$pdf->TCell(20,5,$date1,0,0,'L',0);
									//	
									$pdf->TCell(85,5,$timeline.'น.',0,0,'L',0);
									//
									$pdf->TCell(100,5,$date2,0,0,'L',0);
///////////////////////////////////////////////////////////////////////////////////////
			

					

/*
			//Go to next row
			$y_axis = $y_axis+($row_height)+3;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(120);
									$pdf->TCell(50,5,$small_name,0,0,'L',0);
									// 
									$pdf->TCell(50,5,$ObjPa->$date_small.' น.',0,0,'L',0);
									// 
*/
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		$y_axis = $y_axis_initial;	
		$i = $i + 1;
		$r = $r + 1;


$pdf->Output();
?>