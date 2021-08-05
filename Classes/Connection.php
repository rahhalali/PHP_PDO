<?php
namespace App;
use PDO;
use PDOException;
class Connection
{
public function connect(): ?PDO
{
    $servername = "localhost";
    $username = "rahhal";
    $password = "Rahhal143464";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=First", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return null;
}
}