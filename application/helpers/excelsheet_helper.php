<?php 

//require_once('Excel/reader.php');

//get main CodeIgniter object

// class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

//        public function readCell($column, $row, $worksheetName = '') {
//            // Read title row and rows 20 - 30
//            if ($row == 1 || ($row >= 20 && $row <= 30)) {
//                return true;
//            }
//            return false;
//        }
//    }

// function getvalues($value='') {
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
//    $reader->setReadFilter( new MyReadFilter() );
//    $spreadsheet = $reader->load("uploads/temp/default1.xlsx");
   
// }

// //fetch active rows
// function setvalue($val=''){
// 	//get the instence
// 	$spreadSheet =  \PhpOffice\PhpSpreadsheet\IOFactory::load( 'uploads/temp/default1.xlsx' );
// 	$worksheet = $spreadSheet->getActiveSheet();
// 	$rows = [];
// 	foreach ($worksheet->getRowIterator() AS $row) {
// 	    $cellIterator = $row->getCellIterator();
// 	    $cellIterator->setIterateOnlyExistingCells(FALSE); 
// 	    $cells = [];
// 	    foreach ($cellIterator as $cell) {
// 	        $cells[] = $cell->getValue();
// 	    }
// 	    $rows[] = $cells;
// 	}
// 	return $rows;

// }

// // fetch specific cells
// function updateCell($value=''){
	
// 	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('uploads/temp/default1.xlsx');

// 	$worksheet = $spreadsheet->getActiveSheet();

// 	$worksheet->getCell($value['cell'])->setValue($value['value']); 

// 	$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
// 	return $writer->save('uploads/temp/'.$value['filename'].'.xls');

// }