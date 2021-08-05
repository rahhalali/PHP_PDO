<?php


namespace App;
use PDOException;
session_start();
class Rename
{
    protected $conn;
    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->connect();
    }
    public function rename($New ,$path,$new){
        try {
            $query=("UPDATE Files SET Name = '$New' , Path = '$path' WHERE Id={$new}");
            $result=$this->conn->prepare($query);
            $result->execute();
        }catch (PDOException $e){
            echo  $e->getMessage();
        }

    }
}