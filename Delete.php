<?php
require_once "vendor/autoload.php";
use App\Connection;

$db = new Connection();
$conn = $db->connect();

$id = $_GET['did'];

$query="DELETE FROM Blogs WHERE Blog_id={$id}";
$stmt=$conn->prepare($query);
$stmt->execute();
header("location:Dashboard.php");