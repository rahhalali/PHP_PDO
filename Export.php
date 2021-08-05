<?php
require_once 'vendor/autoload.php';
use App\Connection;
session_start();

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$db = new Connection();
$conn = $db->connect();
$yes=$_SESSION['id'];
if(isset($_POST['export'])){
    $query ="SELECT * FROM Blogs where `User_id`=$yes";
    $stmt =$conn->prepare($query);
    $stmt->execute();
    $file =new Spreadsheet();
    $active_sheet =$file->getActiveSheet();
    $active_sheet->getColumnDimension('A')->setWidth(40);
    $active_sheet->getColumnDimension('B')->setWidth(50);
    $active_sheet->getColumnDimension('C')->setWidth(100);
    $active_sheet->setCellValue('A1','Title');
    $active_sheet->setCellValue('B1','Overview');
    $active_sheet->setCellValue('C1','Content');
    $active_sheet->setCellValue('D1','Date');
    $count =2 ;
    while ($result =$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $active_sheet->setCellValue('A'.$count,$result['Title']);
        $active_sheet->setCellValue('B'.$count,$result['Overview']);
        $active_sheet->setCellValue('C'.$count,$result['Content']);
        $active_sheet->setCellValue('D'.$count,$result['Date']);
        $count = $count +1 ;
    }
    try {
        $writer = IOFactory::createWriter($file, "Xlsx");
        $file_name =time() .'.'.strtolower("Xlsx");
        $writer->save($file_name);
    } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
    }
    header('Content-Type:application/x-www-form-urlencoded');
    header("Content-Transfer-Encoding:Binary");
    header("Content-disposition:attachment;filename=\"".$file_name."\"");
    readfile($file_name);
    unlink($file_name);
    exit;
}else{
    header("location:Dashboard.php");
}
