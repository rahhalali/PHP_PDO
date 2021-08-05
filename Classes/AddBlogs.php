<?php
namespace App;
use PDO;
use PDOException;

class AddBlogs
{
    protected $conn;
    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->connect();
    }
    public function Add($Title ,$Overview,$Content)
    {
        try{
            $dt=date("Y-m-d");// Today's date
            $query="INSERT INTO Blogs (Title ,Overview,Content,Date,User_ID)  VALUES (:Title,:Overview,:Content,:dt,:UserID) ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':Title', $Title);
            $stmt->bindParam(':Overview', $Overview);
            $stmt->bindParam(':Content', $Content);
            $stmt->bindParam(':dt',$dt,PDO::PARAM_STR,10);
            $stmt->bindParam(':UserID', $_SESSION['id']);
            $stmt->execute();
        } catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }

}