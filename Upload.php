<?php
require_once "vendor/autoload.php";
session_start();
use App\Connection;
$db=new Connection();
$conn=$db->connect();
$userid = $_SESSION['id'];
$folder = "user_".$userid;
$upload_dir = "user_images/$folder/";
$upload_path = $upload_dir;
$file_name = $_FILES['file']['name'];
$file_temp = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
echo $imageFileType;
echo $file_name;
$location="user_images/$folder/".basename($file_name);
if(ISSET($_POST['upload'])){
    if(!is_dir($upload_dir)){
        mkdir($upload_dir, 0777);
        chmod($upload_dir, 0777);
    }
    if($file_size < 5242880 && !file_exists($location) && ($imageFileType == 'png' || $imageFileType =='jpg' || $imageFileType =='jpeg' || $imageFileType == 'gif')){
        if(move_uploaded_file($file_temp, $location)){
            try{
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `Files`(Name, Size, Format, PATH ,User_id)  VALUES ('$file_name', '$file_size','$file_type','$location' ,'{$_SESSION['id']}')";
                $conn->exec($sql);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            $_SESSION['error']="";
            $conn = null;
            header('location: Addfiles.php');
        }
    }elseif($file_size > 5242880){
        $_SESSION['error'] = "File Too long";
        header('location: Addfiles.php');
    }elseif (file_exists($location)){
        $_SESSION['error'] ="File is already exist";
        header('location: Addfiles.php');
    }elseif($imageFileType != 'png' || $imageFileType !='jpg' || $imageFileType !='jpeg' || $imageFileType != 'gif'){
        $_SESSION['error'] ="The type of file should be JPG or PNG or JPEG or GIF";
        header('location: Addfiles.php');
    }
}
if(ISSET($_GET['id'])){
    $query="DELETE FROM `Files` WHERE Id={$_GET['id']}";
    $query1="select Name from Files where Id={$_GET['id']} ";
    $stmt1=$conn->prepare($query1);
    $stmt1->execute();
    $res=$stmt1->fetch(PDO::FETCH_ASSOC);
    $stmt=$conn->prepare($query);
    $stmt->execute();
    unlink("user_images/$folder/".$res['Name']);
    header("location:Addfiles.php");
}
