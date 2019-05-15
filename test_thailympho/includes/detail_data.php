<?
$hostname = "localhost";	
$user = "tshort_lymphoma";	
$password = "tsh00924";	
$dbname = "tshort_lymphoma";	
$tblname = "web_add_data";	

										// เริ่มติดต่อฐานข้อมูล
											$connect = mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

										// เลือกฐานข้อมูล
										$db = mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");		
												// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("ส่งคิวรีไม่ได้");
$result = mysql_fetch_array($dbquery);
		$id = $result[id];
		$centre = $result[centre];
		$codehos = $result[codehos];
		$subject = $result[subject];
		$patient_initials = $result[patient_initials];
		$diagnosis_cml = $result[diagnosis_cml];
		$date_diagnosis = $result[date_diagnosis];
		$month_diagnosis = $result[month_diagnosis];
		$year_diagnosis = $result[year_diagnosis];
		$date_birth = $result[date_birth];
		$month_birth = $result[month_birth];
		$year_birth = $result[year_birth];
		$genden = $result[genden];
		$current_address = $result[current_address];
		$zip_code = $result[zip_code];
		$payment = $result[payment];
		$date_assessment = $result[date_assessment];
		$month_assessment= $result[month_assessment];
		$year_assessment = $result[year_assessment];
		$ecog_score = $result[ecog_score];
		$spleen_size = $result[spleen_size];
		$hematology_lab1 = $result[hematology_lab1];
		$hematology_lab2 = $result[hematology_lab2];
		$platelet_count = $result[platelet_count];
		$basophil = $result[basophil];
		$eosinophil = $result[eosinophil];
		$blast_cell = $result[blast_cell];
		$sokal = $result[sokal];
		$euro_hasford = $result[euro_hasford];
		$eutos = $result[eutos];
		$cytogenetic_study = $result[cytogenetic_study];
		$ph_chromosome = $result[ph_chromosome];
		$number_metaphase = $result[number_metaphase];
		$add_chrom = $result[add_chrom];
		$bcr_abl = $result[bcr_abl];
		$definitive = $result[definitive];
		$daily_dose = $result[daily_dose];
		$date_start = $result[date_start];
		$month_start = $result[month_start];
		$year_start = $result[year_start];
		$allogeneic_sct = $result[allogeneic_sct];
		$date_transplantation = $result[date_transplantation];
		$month_transplantation = $result[month_transplantation];
		$year_transplantation = $result[year_transplantation];
	
						         
?>
