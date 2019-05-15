<?php 
date_default_timezone_set("Asia/Bangkok");
require_once "PHPExcel/Classes/PHPExcel.php";




 $data = array(
  
    array(
        'A1' => 'case1',
        'B1' => 'BMA10'
    ),
    array(
        'A1' => 'case1',
        'B1' => 'BMA10'
    ),
    array(
        'A1' => 'case1',
        'B1' => 'BMA10'
    ),
  
 
    array(
        'A1' => 'case2',
        'B1' => 'BMA30'
    ),
    array(
        'A1' => 'case2',
        'B1' => 'BMA30'
    ),
    array(
        'A1' => 'case2',
        'B1' => 'BMA30'
    ),
 
 
    array(
        'A1' => 'case3',
        'B1' => 'BMA20'
    ),
    array(
        'A1' => 'case3',
        'B1' => 'BMA20'
    ),
    array(
        'A1' => 'case3',
        'B1' => 'BMA20'
    ),
    array(
        'A1' => 'case4',
        'B1' => 'BMA20'
    ),
    array(
        'A1' => 'case4',
        'B1' => 'BMA20'
    ),
    array(
        'A1' => 'case4',
        'B1' => 'BMA20'
    )
    
);

// $data1 = array(
  
//     array(
//         'A1' => 'case1',
//         'B1' => 'BMA10'
//     ),
//     array(
//         'A1' => 'case2',
//         'B1' => 'BMA10'
//     ),
//     array(
//         'A1' => 'case3',
//         'B1' => 'BMA10'
//     )
// );
// $data2 = array(
  
//     array(
//         'A1' => 'case11',
//         'B1' => 'BMA10'
//     ),
//     array(
//         'A1' => 'case11',
//         'B1' => 'BMA10'
//     ),
//     array(
//         'A1' => 'case11',
//         'B1' => 'BMA10'
//     )
// );


$worksheet = array(
    'BMA' , 'SSP'
);
// echo "<pre>";
// print_r($data);
// echo "</pre>";

//  echo $data[0][0]['A1'];


// create php excel object
$doc = new PHPExcel();

// set active sheet
// $doc->setActiveSheetIndex(0);


// //First sheet
//     $sheet = $doc->getActiveSheet();

//     //Start adding next sheets
//     $i=0;
//     while ($i < count($data)) {

//       // Add new sheet
//       $objWorkSheet = $doc->createSheet($i); //Setting index when creating

//       //Write cells
//       foreach( $data[$i] as $key => $value){
        
//               $objWorkSheet->setCellValue('A'.$key, $value['A1'])
//                            ->setCellValue('B'.$key, $value['B1']);
//       }
      

//       // Rename sheet
//       $objWorkSheet->setTitle("$i");

//       $i++;
//     }

$sheet = $doc->getActiveSheet();

$checkNewSheet='';
$row = 1;
foreach($data as $key => $value){

      if($value['A1'] != $checkNewSheet ){ // new sheet
          $objWorkSheet = $doc->createSheet(0);
       
           $objWorkSheet->setCellValue('A1', $value['A1'])
                        ->setCellValue('B1', $value['B1']);

          $i = $value['A1'];

         
          $row = 2;
      } else {
          
          $objWorkSheet->setCellValue('A'.$row, $value['A1'])
                       ->setCellValue('B'.$row, $value['B1']);

                      
          $row++;
      }
   
      
}



//save our workbook as this file name
$filename = 'just_some_random_name.xls';
//mime type
header('Content-Type: application/vnd.ms-excel');
//tell browser what's the file name
header('Content-Disposition: attachment;filename="' . $filename . '"');

header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format

$objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');

//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');

?>