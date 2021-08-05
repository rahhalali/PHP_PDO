<?php


namespace App;
use PDOException;
class Update
{
    protected $conn;
    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->connect();
    }
    public function update($Title ,$Overview,$Content ,$new){
        try {
            $query=("UPDATE Blogs SET Title ='$Title',Overview='$Overview',Content='$Content' WHERE Blog_id={$new}");
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
        }catch (PDOException $e){
            echo  $e->getMessage();
        }

    }
}