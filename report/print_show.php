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
$dbname = "aml-all";	//ชื่อฐานข้อมูล
$tblname = "web_add_data";	//ชื่อตาราง


$datatitle = 'Acute leukemia registry form';
$code ='Code : ';

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
		$code_id = $result[code_id];
		$fl = $result[fl];
		$sex  = $result[sex];
		$date_birth  = $result[date_birth ];
		$province  = $result[province];
		$treatment  = $result[treatment];
		$career   = $result[career];
		$date_diagnostic   = $result[date_diagnostic];
		$diagnosis   = $result[diagnosis];
		$cytogenetics   = $result[cytogenetics];
		$cytogenetics_i   = $result[cytogenetics_i];
		$cytogenetics_ii   = $result[cytogenetics_ii];
		$cbc   = $result[cbc];
		$cbci   = $result[cbci];
		$cbcii   = $result[cbcii];
		$cbciii   = $result[cbciii];
		$bm_don   = $result[bm_don];
		$bmi   = $result[bmi];
		$bm_not   = $result[bm_not];
		$organ   = $result[organ];
		$organ_i   = $result[organ_i];
		$organ_ii   = $result[organ_ii];
		$organ_iv   = $result[organ_iv];
		$organ_vv   = $result[organ_vv];
		$organ_ivv   = $result[organ_ivv];
		$organ_vvv   = $result[organ_vvv];
		$organ_ivvv   = $result[organ_ivvv];
		$organ_vvvv   = $result[organ_vvvv];
		$ecog   = $result[ecog];
		$cap   = $result[cap];
		$capi   = $result[capi];
		$capii   = $result[capii];
		$initial   = $result[initial];
		$anthracycline   = $result[anthracycline];
		$reponse_i   = $result[reponse_i];
		$response_i_i   = $result[response_i_i];
		$second   = $result[second];
		$secondi   = $result[secondi];
		$secondii   = $result[secondii];
		$responseii   = $result[responseii];
		$post_remission   = $result[post_remission];
		$post_remissioni_i   = $result[post_remissioni_i];
		$post_remissionii   = $result[post_remissionii];
		$post_remissionii_i   = $result[post_remissionii_i];
		$post_remissioniv   = $result[post_remissioniv];
		$post_remissioniv_iv   = $result[post_remissioniv_iv];
		$post_remissionvv   = $result[post_remissionvv];
		$post_remissionvv_vv   = $result[post_remissionvv_vv];
		$post_remissionivv   = $result[post_remissionivv];
		$post_yn   = $result[post_yn];
		$yeari   = $result[yeari];
		$yeari_i   = $result[yeari_i];
		$yearii   = $result[yearii];
		$yearii_ii   = $result[yearii_ii];
		$initial_induction   = $result[initial_induction];
		$initial_induction_i   = $result[initial_induction_i];
		$anthracycline_i   = $result[anthracycline_i];
		$differentiatine   = $result[differentiatine];
		$response_i   = $result[response_i];
		$second_induction   = $result[second_induction];
		$second_induction_i   = $result[second_induction_i];
		$response_ii   = $result[response_ii];
		$consolidation   = $result[consolidation];
		$consolidation_i   = $result[consolidation_i];
		$consolidation_ii   = $result[consolidation_ii];
		$consolidation_iv   = $result[consolidation_iv];
		$consolidation_vv   = $result[consolidation_vv];
		$response_co   = $result[response_co];
		$maintenance   = $result[maintenance];
		$year_followi   = $result[year_followi];
		$year_followi_i   = $result[year_followi_i];
		$year_follow_up   = $result[year_follow_up];
		$year_follow_date   = $result[year_follow_date];
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
			
			//Go to next row   คำร้องทั่วไป
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',20);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(75);
									$pdf->TCell(100,4,$datatitle,0,0,'L',0);

				//Go to next row  code 
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,25,$code,0,0,'L',0);
				//Go to next row  code 
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(35);
									$pdf->TCell(100,25,$code_id,0,0,'L',0);	
			//Go to next row  อักษรตัวแรกของชื่อและนามสกุล
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(55);
									$pdf->TCell(100,25,อักษรตัวแรกของชื่อและนามสกุล,0,0,'L',0);			
			//Go to next row  $fl
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',18);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(110);
									$pdf->TCell(100,25,$fl,0,0,'L',0);			
										
			//Go to next row  $sex
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(125);
									$pdf->TCell(100,25,'sex : ',0,0,'L',0);		
			//Go to next row  $sex
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(135);
									$pdf->TCell(100,25,$sex,0,0,'L',0);		
			//Go to next row  $date of birth
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(145);
									$pdf->TCell(100,25,'date of birth :',0,0,'L',0);			
		//Go to next row  date of birth
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(170);
									$pdf->TCell(100,25,$date_birth,0,0,'L',0);	
					//Go to next row  ภูลำเนา 
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,40,'ภูมิลำเนา :',0,0,'L',0);		
									
					//Go to next row  จังหวัด
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(40);
									$pdf->TCell(100,40,$province,0,0,'L',0);						
																
					//Go to next row  สิทธิการรักษาพยาบาล
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(55);
									$pdf->TCell(100,40,'สิทธิการรักษา :',0,0,'L',0);	
													
						//Go to next row  $treatment
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(80);
									$pdf->TCell(100,40,$treatment,0,0,'L',0);								
					//Go to next row   $title
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(125);
									$pdf->TCell(100,40,'อาชีพ :',0,0,'L',0);			
									
					//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(140);
									$pdf->TCell(100,40,$career,0,0,'L',0);			
///////////////////////////////////////////////////////////////////////////////////				
					//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',18);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,60,'Leukemia  diagnosis',0,0,'L',0);		
				//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,75,'Date of 1st diagnostic :',0,0,'L',0);			
				//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(60);
									$pdf->TCell(100,75,$date_diagnostic,0,0,'L',0);																							
				//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(80);
									$pdf->TCell(100,75,'Diagnosis :',0,0,'L',0);	
				//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(100);
									$pdf->TCell(100,75,$diagnosis,0,0,'L',0);	
					//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,90,'Cytogenetics :',0,0,'L',0);						
				//Go to next row   cytogenetics
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(45);
									$pdf->TCell(100,90,$cytogenetics ,0,0,'L',0);					
				//Go to next row  CBC  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(66);
									$pdf->TCell(100,90,'CBC(At diagnosis) :' ,0,0,'L',0);				
					//Go to next row  wec  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(100);
									$pdf->TCell(100,90,'WBC',0,0,'L',0);	
					//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(113);
									$pdf->TCell(100,90,$cbc,0,0,'L',0);	
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(120);
									$pdf->TCell(100,90, 'microliter  Blast',0,0,'L',0);	
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(150);
									$pdf->TCell(100,90, $cbci,0,0,'L',0);		
				//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(156);
									$pdf->TCell(100,90, '%  Hb',0,0,'L',0);		
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(170);
									$pdf->TCell(100,90, $cbcii,0,0,'L',0);		
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(177);
									$pdf->TCell(100,90, 'g/dL',0,0,'L',0);	
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,105, 'Plt ',0,0,'L',0);		
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(30);
									$pdf->TCell(100,105, $cbciii,0,0,'L',0);	
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(35);
									$pdf->TCell(100,105,'microliter   %Blast in BM at diagnosis :',0,0,'L',0);				
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(100);
									$pdf->TCell(100,105,$bm_don,0,0,'L',0);	
							
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(109);
									$pdf->TCell(100,105,$bmi,0,0,'L',0);	
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(109);
									$pdf->TCell(100,105,$bm_not,0,0,'L',0);																																																																										
/////////////////////////////////////////////////////////////////////////
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,120,'Organ involvement(extramedullary  diseases): ',0,0,'L',0);	
			  if   ($organ_ivvv == 1	){
				  $other  = other;
			  }else{}
			//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,135, $organ.'-'.$organ_i.'-'.$organ_ii.'-'.$organ_iv.'-'.$organ_vv.'-'.$organ_ivv.'-'.$organ_vvv.'-'.$other.'-'.$organ_vvvv,0,0,'L',0);	
////////////////////////////////////////////////////////////////////////
			//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,150,'ECOG :  '.$ecog,0,0,'L',0);	
			//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(40);
									$pdf->TCell(100,150,'Complications  at  Presentation :  ',0,0,'L',0);		   
			//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(95);
									$pdf->TCell(100,150,$cap,0,0,'L',0);		
				//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(135);
									$pdf->TCell(100,150,$capi,0,0,'L',0);		
				//Go to next row   
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(160);
									$pdf->TCell(100,150,$capii,0,0,'L',0);								
	/////////////////////////////////////////////////////////////////////////
		//Go to next row  หน้าสอง
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',18);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(40);
									$pdf->TCell(100,170,'Acute leukemia registry form-follow up data for non-APL AML (2nd entry)',0,0,'L',0);		
	//Go to next row       
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,185,'Initial  Induction : '.$initial,0,0,'L',0);		
		//Go to next row       
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,200,'Anthracycline :  '.$anthracycline,0,0,'L',0);		
		//Go to next row  
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(70);
									$pdf->TCell(100,200,'Response to 1 st  Induction : ' .$reponse_i.'   '.$response_i_i,0,0,'L',0);		
		//Go to next row      
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,215,'Second induction(in case not in CR from first induction):  '.$second.'  '.$secondi.'  '.$secondii  ,0,0,'L',0);									
			//Go to next row       
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,230,'Response to 2nd  Induction : '.$responseii.'  '.$responseii_i ,0,0,'L',0);									
				//Go to next row       
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,240,$responseii_i,0,0,'L',0);				
				//Go to next row       ห้อง
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(178);
									$pdf->TCell(100,160,'',0,0,'L',0);						
	///////////////////////////////////////////////////////////////////////////////
		//Go to next row       มีความประสงค์
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,180,'',0,0,'L',0);	
		//Go to next row       มีความประสงค์1
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(50);
									$pdf->TCell(100,180,'',0,0,'L',0);					
									
///////////////////////////////////////////////////////////////////////////////////////
				//Go to next row       รายละเอียด
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(50);
									$pdf->TCell(100,200,'',0,0,'L',0);		

///////////////////////////////////////////////////////////////////////////////////////
		//Go to next row       จึงเรียนมาเพื่อโปรพิจารณา
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(30);
									$pdf->TCell(100,300,'',0,0,'L',0);	


///////////////////////////////////////////////////////////////////////////////////////
		//Go to next row       เลขบัตรประชาชน
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(100,320,'',0,0,'L',0);	

			//Go to next row       เลขบัตรประชาชน
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(70);
									$pdf->TCell(100,320,$idcard,0,0,'L',0);	
									
											//Go to next row       ขอแสดงความนับถือ
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(100);
									$pdf->TCell(100,340,'',0,0,'L',0);	
									
				
			//Go to next row       ลงชื่อ
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(80);
									$pdf->TCell(100,390,'',0,0,'L',0);			
									
				//Go to next row       ชื่อ
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(100);
									$pdf->TCell(100,390,'',0,0,'L',0);			
					//Go to next row       ผู้ยื่นคำร้องขอ
			$y_axis = $y_axis_initial;
			$pdf->SetFont('AngsanaNew','B',14);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(140);
									$pdf->TCell(100,390,'',0,0,'L',0);														
									
	//Go to next row
			$y_axis = $y_axis+$row_height+15;
			$pdf->SetFont('AngsanaNew','B',16);	
			$pdf->SetY($y_axis);	
			$pdf->SetX(20);
									$pdf->TCell(18,5,'',0,0,'L',0);
								
							
///////////////////////////////////////////////////////////////////////////////////////
									
					
								
///////////////////////////////////////////////////////////////////////////////////////
				
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