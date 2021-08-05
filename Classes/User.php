<?php
namespace App;
use PDOException;

class User
{
    protected $conn;
    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->connect();
    }
   public function store(string $Username ,string $Email,string $Password)
   {
        try{
            $query="INSERT INTO Users (Username ,Email,Password)  VALUES (:Username,:Email,:Password) ";
            $hash = password_hash($Password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':Username', $Username);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Password', $hash);
            $stmt->execute();
            echo "New record created successfully";
        } catch(PDOException $e) {
            echo  $e->getMessage();
             }
        }
}
