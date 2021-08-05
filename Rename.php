<?php
require_once 'vendor/autoload.php';
include "dashboard.php";
use App\Connection;

$db=new Connection();
$conn=$db->connect();


    $query1="select * from Files where Id={$_GET['rid']} ";
    $stmt1=$conn->prepare($query1);
    $stmt1->execute();
    while($res=$stmt1->fetch(PDO::FETCH_ASSOC)){?>
            <link href="Classes/CSS/Rename.css" rel="stylesheet">
        <div class="Show">
            <button name="close" class="close"><a href="Close_Rename.php" style="text-decoration: none">&times;</a></button>
         <form action="Rename_Update.php" name="hide" method="post">
             <input type="hidden" name="hide" value="<?php echo $res['Id']?>" />
        <input type="text" name="rename" value="<?php echo $res['Name']?>" />
        <button name="btn" class="btn"> Save</button>
    </form>
</div>

   <?php
}
?>

