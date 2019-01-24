<?php
//подключение скрипта парсер 
include_once 'script1.php';


require_once 'Classes/PHPExcel.php';
$pExcel = new PHPExcel();

$pExcel->setActiveSheetIndex(0);
$aSheet = $pExcel->getActiveSheet();


//ширина столбцов
$aSheet->getColumnDimension('A')->setWidth(10);
$aSheet->getColumnDimension('B')->setWidth(25);
$aSheet->getColumnDimension('C')->setWidth(65);
$aSheet->getColumnDimension('D')->setWidth(10);
$aSheet->getColumnDimension('E')->setWidth(10);
$aSheet->getColumnDimension('F')->setWidth(10);
$aSheet->getColumnDimension('G')->setWidth(10);
$aSheet->getColumnDimension('H')->setWidth(10);


$aSheet->getRowDimension('1')->setRowHeight(25);
$aSheet->getRowDimension('1')->setRowHeight(20);
$aSheet->mergeCells('A1:H1');




$aSheet->setCellValue('A1','Результат парсера источник http://superzapravka.ru/katalog');



$aSheet->setCellValue('A2','Код');
$aSheet->setCellValue('B2','Фото');
$aSheet->setCellValue('C2','Наименование');
$aSheet->setCellValue('D2','От 1 шт.');
$aSheet->setCellValue('E2','От 2 шт.');
$aSheet->setCellValue('F2','От 3 шт.');
$aSheet->setCellValue('G2','От 11 шт.');
$aSheet->setCellValue('H2','У нас');


$i = 0;
	foreach($news as $elem){
		$aSheet->setCellValue('A'.($i+2), strip_tags($elem->first_child ()));
		$aSheet->setCellValue('B'.($i+2), strip_tags($elem->children (1)));
		$aSheet->setCellValue('C'.($i+2), strip_tags($elem->children (2)));
		$aSheet->setCellValue('D'.($i+2), strip_tags($elem->children (3)));
		$aSheet->setCellValue('E'.($i+2), strip_tags($elem->children (4)));
		$aSheet->setCellValue('F'.($i+2), strip_tags($elem->children (5)));
		$aSheet->setCellValue('G'.($i+2), strip_tags($elem->children (6)));
		$aSheet->setCellValue('H'.($i+2), strip_tags($elem->children (7)));
		$i++;
	}
	




//сохранение
$objWriter = new PHPExcel_Writer_Excel2007($pExcel);
$objWriter->save('simple1.xlsx');