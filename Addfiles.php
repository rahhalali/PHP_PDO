<?php
session_start();
require_once "vendor/autoload.php";
include "dashboard.php";
use App\Connection;
$db = new Connection();
$conn = $db->connect();

?>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
<link href="/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
<!--<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css" />-->
<link href="Classes/CSS/Addfiles.css" rel="stylesheet">
<div ng-app="myModule" ng-controller="myController" style="width: 90%;margin: 1% auto;">
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <hr style="border-top:1px dotted #ccc;">
    <div  style="width: 50%;margin: 1%  auto 2% auto; border: 0.5px solid gray;box-shadow:10px 10px 50px 10px grey;border-radius: 12px">
        <form method="POST" enctype="multipart/form-data" action="Upload.php" style="display: flex;flex-direction: column">
            <div class="form-group">
                <label style="display: flex;justify-content: center">Upload here</label>
                <input name="file" type="file"  required="required" class="form-control" style="display: block;width: 30%;margin: 0 auto"/>
            </div>
            <center><button class="btn btn-primary" name="upload" >Upload</button></center>
            <center><?php echo $_SESSION['error']?></center>
            <center><?php echo $_SESSION['name']?></center>
        </form>
    </div>
    <div class="container" >
        <div>
            <table>
                <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>File Type </th>
                    <th>File Path</th>
                    <th style="text-align: center">Action</th>
                </tr>

                <?php
                $sql = "SELECT * FROM `Files` WHERE User_id={$_SESSION['id']}";
                $query = $conn->prepare($sql);
                $query->execute();
                while($fetch = $query->fetch()){
                    ?>
                    <tr>
                        <td><?php echo $fetch['Name']?></td>
                        <td><?php echo $fetch['Size']?></td>
                        <td><?php echo $fetch['Format']?></td>
                        <td><?php echo $fetch['Path']?></td>
                        <td style="display: flex;
                         justify-content: space-around">
                            <button name="edit" class="edit"><a href="Rename.php?rid=<?php echo $fetch['Id']?>"><i class="fas fa-edit"></i></a></button>
                            <button name="dt" class="delete"><a href="Upload.php?id=<?php echo $fetch['Id'] ?>"><i class="fas fa-trash"></i></a></button>
                            <button name="download" class="download"><a href="<?php echo $fetch['Path']?>" download><i class="fas fa-download"></i></a></button></td>
                    </tr>

                    <?php
                }
                ?>

            </table>
        </div>
    </div>
</div>
</div>

