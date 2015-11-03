<?php
require('config.php');
require 'libs/Smarty.class.php';
$smarty = new Smarty;

require('testexcel/Classes/PHPExcel.php');

$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

$objPHPExcel = new PHPExcel();

require('getfloorrooms.php');
//print_r($allrooms);
//die();

$sheetindex=0;
$objPHPExcel->removeSheetByIndex($sheetindex);
foreach ($allrooms as &$room) {
  $objPHPExcel->createSheet($sheetindex);
  $objPHPExcel->setActiveSheetIndex($sheetindex);
  $objPHPExcel->getActiveSheet()->setTitle($room['name']);
  $roomid=$room['id'];
  unset($devices);
  require('getdevices.php');

    $objPHPExcel->getActiveSheet()->SetCellValue('A'."1", "Device ID");
    $objPHPExcel->getActiveSheet()->SetCellValue('B'."1", "HB Number");
    $objPHPExcel->getActiveSheet()->SetCellValue('C'."1", "Type");
    $objPHPExcel->getActiveSheet()->SetCellValue('D'."1", "Make");
    $objPHPExcel->getActiveSheet()->SetCellValue('E'."1", "Working?");
    $objPHPExcel->getActiveSheet()->SetCellValue('F'."1", "Added by User");
    $objPHPExcel->getActiveSheet()->SetCellValue('G'."1", "Comments");
    $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

$rowCount = 2;
foreach ($devices as &$row) {
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['id']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['hbnumber']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['type']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['make']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['working']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['first_name'] . ' ' . $row['last_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['comment']);
    $rowCount++;
}
foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
        $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
    }

  $sheetindex++;
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
// It will be called file.xls
header('Content-Disposition: attachment; filename="pcauditresults.xls"');
// Write file to the browser
$objWriter->save('php://output');
