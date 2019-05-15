
<? include "modules/index/header.php" ; ?>
<?php 

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$id=$_POST['id'];
		$code_id= $_POST["code_id"];
		$fl = $_POST["fl"];
		$sex = $_POST["sex"];
		$date_birth = $_POST["date_birth"];
		$province = $_POST["province"];
		$treatment = $_POST["treatment"];			
		$career = $_POST["career"];		
	    $date_diagnostic = $_POST["date_diagnostic"];
		$diagnosis = $_POST["diagnosis"];		
		$diagnosis_i = $_POST["diagnosis_i"];		
		$cytogenetics = $_POST["cytogenetics"];		
		$cytogenetics_i = $_POST["cytogenetics_i"];		
		$cbc = $_POST["cbc"];		
		$cbci = $_POST["cbci"];		
		$cbcii = $_POST["cbcii"];		
		$cbciii = $_POST["cbciii"];		
		$bm_don = $_POST["bm_don"];		
		$bmi = $_POST["bmi"];		
		$organ = $_POST["organ"];		
		$organ_i = $_POST["organ_i"];		
		$organ_ii = $_POST["organ_ii"];		
		$organ_iv = $_POST["organ_iv"];		
		$organ_vv = $_POST["organ_vv"];		
		$organ_ivv = $_POST["organ_ivv"];		
		$organ_vvv = $_POST["organ_vvv"];		
		$organ_ivvv = $_POST["organ_ivvv"];		
		$organ_vvvv = $_POST["organ_vvvv"];		
		$ecog = $_POST["ecog"];		
		$cap = $_POST["cap"];		
		$capi = $_POST["capi"];		
		$capii = $_POST["capii"];		
		$initial = $_POST["initial"];		
		$anthracycline_y = $_POST["anthracycline_y"];		
		$anthracycline = $_POST["anthracycline"];		
		$reponse_i = $_POST["reponse_i"];		
		$response_i_i = $_POST["response_i_i"];		
		$second = $_POST["second"];		
		$secondi = $_POST["secondi"];		
		$secondii = $_POST["secondii"];		
		$responseii = $_POST["responseii"];		
		$responseii_i = $_POST["responseii_i"];		
		$post_remission = $_POST["post_remission"];		
		$post_remissioni_i = $_POST["post_remissioni_i"];		
		$post_remissionii = $_POST["post_remissionii"];	
		$post_remissionii_i = $_POST["post_remissionii_i"];	
		$post_remissioniv = $_POST["post_remissioniv"];	
		$post_remissioniv_iv = $_POST["post_remissioniv_iv"];	
		$post_remissionvv = $_POST["post_remissionvv"];	
		$post_remissionvv_vv = $_POST["post_remissionvv_vv"];	
		$post_remissionivv = $_POST["post_remissionivv"];	
		$post_yn = $_POST["post_yn"];	
		$yeari = $_POST["yeari"];	
		$yeari_i = $_POST["yeari_i"];	
		$yearii = $_POST["yearii"];		
		$yearii_ii = $_POST["yearii_ii"];		
		$initial_induction = $_POST["initial_induction"];		
		$initial_induction_i = $_POST["initial_induction_i"];		
		$anthracycline_i = $_POST["anthracycline_i"];		
		$differentiatine = $_POST["differentiatine"];		
		$response_i = $_POST["response_i"];		
		$second_induction = $_POST["second_induction"];	
		$second_induction_i = $_POST["second_induction_i"];	
		$response_ii = $_POST["response_ii"];	
		$consolidation = $_POST["consolidation"];	
		$consolidation_i = $_POST["consolidation_i"];	
		$consolidation_ii = $_POST["consolidation_ii"];	
		$consolidation_iv = $_POST["consolidation_iv"];	
		$consolidation_vv = $_POST["consolidation_vv"];	
		$response_co = $_POST["response_co"];	
		$maintenance = $_POST["maintenance"];	
		$year_followi = $_POST["year_followi"];	
		$year_followi_i = $_POST["year_followi_i"];	
		$year_follow_up = $_POST["year_follow_up"];	
		$year_follow_date = $_POST["year_follow_date"];	

$code_id = htmlspecialchars($code_id) ;
$fl = htmlspecialchars($fl) ;
$sex = htmlspecialchars($sex) ;  
$date_birth = htmlspecialchars($date_birth) ;
$province = htmlspecialchars($province) ;
$treatment = htmlspecialchars($treatment) ;
$career = htmlspecialchars($career) ;
$date_diagnostic = htmlspecialchars($date_diagnostic) ;
$diagnosis = htmlspecialchars($diagnosis) ;
$cytogenetics = htmlspecialchars($cytogenetics) ;
$cytogenetics_i = htmlspecialchars($cytogenetics_i) ;
$cbc = htmlspecialchars($cbc) ;
$cbci = htmlspecialchars($cbci) ;
$cbcii = htmlspecialchars($cbcii) ;
$cbciii = htmlspecialchars($cbciii) ;
$bm_don = htmlspecialchars($bm_don) ;
$bmi = htmlspecialchars($bmi) ;
$organ = htmlspecialchars($organ) ;
$organ_i = htmlspecialchars($organ_i);
$organ_ii = htmlspecialchars($organ_ii) ;
$organ_iv = htmlspecialchars($organ_iv) ;
$organ_vv = htmlspecialchars($organ_vv) ;
$organ_ivv = htmlspecialchars($organ_ivv) ;
$organ_vvv = htmlspecialchars($organ_vvv) ;
$organ_ivvv = htmlspecialchars($organ_ivvv) ;
$organ_vvvv = htmlspecialchars($organ_vvvv) ;
$ecog = htmlspecialchars($ecog) ;
$cap = htmlspecialchars($cap) ;
$capi = htmlspecialchars($capi) ;
$capii = htmlspecialchars($capii) ;
$initial = htmlspecialchars($initial) ;
$anthracycline = htmlspecialchars($anthracycline) ;
$reponse_i = htmlspecialchars($reponse_i) ;
$response_i_i = htmlspecialchars($response_i_i) ;
$second = htmlspecialchars($second) ;
$secondi = htmlspecialchars($secondi) ;
$secondii = htmlspecialchars($secondii) ;
$responseii = htmlspecialchars($responseii) ;  
$post_remission = htmlspecialchars($post_remission) ;
$post_remissioni_i = htmlspecialchars($post_remissioni_i) ;
$post_remissionii = htmlspecialchars($post_remissionii) ;
$post_remissionii_i = htmlspecialchars($post_remissionii_i) ; 
$post_remissioniv = htmlspecialchars($post_remissioniv) ; 
$post_remissioniv_iv = htmlspecialchars($post_remissioniv_iv) ; 
$post_remissionvv_vv = htmlspecialchars($post_remissionvv_vv) ; 
$post_remissionivv = htmlspecialchars($post_remissionivv) ; 
$yeari = htmlspecialchars($yeari) ; 
$yeari_i = htmlspecialchars($yeari_i) ; 
$yearii = htmlspecialchars($yearii) ; 
$yearii_ii = htmlspecialchars($yearii_ii) ; 
$initial_induction = htmlspecialchars($initial_induction) ; 
$initial_induction_i = htmlspecialchars($initial_induction_i) ; 
$anthracycline_i = htmlspecialchars($anthracycline_i) ; 
$differentiatine = htmlspecialchars($differentiatine) ; 
$response_i = htmlspecialchars($response_i) ; 
$second_induction = htmlspecialchars($second_induction) ; 
$second_induction_i = htmlspecialchars($second_induction_i) ; 
$response_ii = htmlspecialchars($response_ii) ; 
$consolidation = htmlspecialchars($consolidation) ; 
$consolidation_i = htmlspecialchars($consolidation_i) ; 
$consolidation_ii = htmlspecialchars($consolidation_ii) ; 
$consolidation_iv = htmlspecialchars($consolidation_iv) ; 
$consolidation_vv = htmlspecialchars($consolidation_vv) ; 
$response_co = htmlspecialchars($response_co) ; 
$maintenance = htmlspecialchars($maintenance) ; 
$year_followi = htmlspecialchars($year_followi) ; 
$year_followi_i = htmlspecialchars($year_followi_i) ; 
$year_follow_up = htmlspecialchars($year_follow_up) ; 
$year_follow_date = htmlspecialchars($year_follow_date) ; 
$member_id = htmlspecialchars($member_id) ; 
$date = htmlspecialchars($date) ; 
$month = htmlspecialchars($month) ; 
$year = htmlspecialchars($year) ; 


$result = mysql_query( "update ".TB_ADD_DATA." SET  code_id='$code_id', fl='$fl' ,	sex='$sex', 	date_birth='$date_birth', 	province='$province', 	treatment='$treatment',career='$career' ,date_diagnostic='$date_diagnostic',  	diagnosis='$diagnosis',cytogenetics='$cytogenetics',cytogenetics_i='$cytogenetics_i' ,cbc='$cbc', cbci='$cbci', cbcii='$cbcii',cbciii='$cbciii', bm_don='$bm_don',bmi='$bmi', organ='$organ', organ_i='$organ_i', organ_ii='$organ_ii' , organ_iv='$organ_iv', organ_vv='$organ_vv', organ_ivv='$organ_ivv', organ_vvv='$organ_vvv', organ_ivvv='$organ_ivvv', 
   organ_vvvv='$organ_vvvv', ecog='$ecog', cap='$cap', capi='$capi',capii='$capii',initial='$initial',anthracycline='$anthracycline', reponse_i='$reponse_i', response_i_i='$response_i_i' ,  second='$second', secondi='$secondi',  secondii='$secondii',responseii='$responseii',post_remission='$post_remission',post_remissioni_i='$post_remissioni_i',post_remissionii='$post_remissionii',post_remissionii_i='$post_remissionii_i',
	post_remissioniv ='$post_remissioniv',	post_remissioniv_iv='$post_remissioniv_iv',	post_remissionvv='$post_remissionvv',post_remissionvv_vv='$post_remissionvv_vv',post_remissionivv='$post_remissionivv', 
	yeari='$yeari',	yeari_i='$yeari_i' ,yearii='$yearii', yearii_ii='$yearii_ii',	initial_induction='$initial_induction', initial_induction_i='$initial_induction_i',anthracycline_i='$anthracycline_i' ,differentiatine='$differentiatine',  
	response_i='$response_i' , 	second_induction='$second_induction' ,	second_induction_i='$second_induction_i' ,response_ii='$response_ii'  , consolidation='$consolidation',  consolidation_i='$consolidation_i' , 
	 consolidation_ii='$consolidation_ii', consolidation_iv='$consolidation_iv' , consolidation_vv='$consolidation_vv',	 response_co='$response_co',	 maintenance='$maintenance' , year_followi='$year_followi'  , year_followi_i='$year_followi_i'  , 
	 year_follow_up='$year_follow_up' ,	 year_follow_date='$year_follow_date' , member_id='$member_id' ,  date='$date' ,   month='$month' ,	year='$year'   where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบให้ถูกต้อง");	

/*
$result = mysql_query("update ".TB_ADD_DATA." (code_id,fl,sex,date_birth,province,treatment,career,date_diagnostic,diagnosis,cytogenetics,cytogenetics_i,cytogenetics_ii,cbc,cbci,cbcii,cbciii,bm_don,bmi,organ,organ_i,organ_ii,organ_iv,organ_vv,organ_ivv,organ_vvv,organ_ivvv,organ_vvvv,ecog,cap,capi,capii,initial,anthracycline,reponse_i,response_i_i,second,secondi,secondii,responseii,post_remission,post_remissioni_i,post_remissionii,post_remissionii_i,post_remissioniv,post_remissioniv_iv,post_remissionvv,post_remissionvv_vv,post_remissionivv,yeari,yeari_i,yearii,yearii_ii,initial_induction,initial_induction_i,anthracycline_i,differentiatine,response_i,second_induction,second_induction_i,response_ii,consolidation,consolidation_i,consolidation_ii,consolidation_iv,consolidation_vv,maintenance,year_followi,year_followi_i,year_follow_up,year_follow_date,member_id,date,month,year)values('$code_id','$fl','$date_birth','$province','$treatment','$career','$date_diagnostic','$diagnosis','$cytogenetics','$cytogenetics_i','$cytogenetics_ii','$cbc','$cbci','$cbcii','$cbciii','$bm_don','$bmi','$organ','$organ_i','$organ_ii','$organ_iv','$organ_vv','$organ_ivv', '$organ_vvv', '$organ_ivvv' , '$organ_vvvv', '$ecog','$cap','$capi', '$capii','$initial','$anthracycline','$reponse_i','$response_i_i','$second','$secondi', '$secondii','$responseii', '$post_remission','$post_remissioni_i', '$post_remissionii' ,'$post_remissionii_i' , '$post_remissioniv', '$post_remissioniv_iv', '$post_remissionvv', '$post_remissionvv_vv' , '$post_remissionivv' , '$yeari', '$yeari_i', '$yearii','$yearii_ii', '$initial_induction', '$initial_induction_i', '$anthracycline_i', '$differentiatine', '$response_i', '$second_induction', '$second_induction_i', '$response_ii', '$consolidation', '$consolidation_i', '$consolidation_ii', '$consolidation_iv', '$consolidation_vv', '$maintenance', '$year_followi', '$year_followi_i', '$year_follow_up', '$year_follow_date', '$member_id', '$date', '$month', '$year' ) where id='$id' ") or die ("ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบความผิดพลาด ");
*/
	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=index.php?name=member&file=data_all'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>