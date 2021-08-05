<?php
require_once 'vendor/autoload.php';
use App\Connection;
use App\Rename;
$db=new Connection();
$conn=$db->connect();
session_start();
   $new=$_POST['hide'];
   $Rename=$_POST['rename'];
echo $new ."<br>";
    $query1="select * from Files where Id={$new}";
    $stmt1=$conn->prepare($query1);
    $stmt1->execute();
    $fetch=$stmt1->fetch();
    $PATH=$fetch['Path'];
echo $PATH ."<br>";
    $imageFileType =".".pathinfo($PATH,PATHINFO_EXTENSION);
    echo $imageFileType ."<br>";

echo $Rename ."<br>";
    $New=$Rename.$imageFileType;
echo $new ."<br>";
    $path="user_images/user_{$fetch['User_id']}/".$New;
    echo $path ."<br>";

try{
    rename($fetch['Path'],$path);
    $update =new Rename();
    $update->rename($New,$path,$new);
    header("location:Addfiles.php");
    }catch (PDOException $e){
    echo $e->getMessage();
}



