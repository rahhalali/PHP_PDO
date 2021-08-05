<?php
require_once "vendor/autoload.php";
use App\Connection;
use App\Update;
include "dashboard.php";
$db = new Connection();
$conn = $db->connect();
    if(isset($_POST['save'])){
        $new=$_POST['id'];
        $Title=$_POST['titles'];
        $Overview=$_POST['overviews'];
        $Content=$_POST['contents'];
        $update =new Update();
        $update->update($Title,$Overview,$Content,$new);
        header("location:Dashboard.php");
    }
                $new=$_GET['eid'];
                $result1=$conn->prepare("SELECT * FROM Blogs WHERE Blog_id='$new'");
                $result1->execute();
                while($rows=$result1->fetch(PDO::FETCH_ASSOC)){;
                    ?>
                    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                    <link href="Classes/CSS/Update.css" rel="stylesheet">
                    <div  class="Show modal">
                        <button name="close" class="close"><a href="Close.php" style="text-decoration: none;color: red;">&times;</a> </button>
                        <form action="Update.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $rows['Blog_id']?>" />
                               <label for="titles">Title </label>
                                    <input type="text" id="titles" name="titles" value="<?php echo $rows['Title'] ?>" />
                                            <label for="OverView">OverView </label>
                                            <input type="text" id="OverView" name="overviews" value="<?php echo $rows['Overview'] ?>" />
                            <textarea rows="10" cols="30"  name="contents" ><?php echo $rows['Content'] ?></textarea>
                            <button name="save" class="save">Save</button>
                        </form>
                    </div>
                <?php } ?>

<script type="text/javascript">
    CKEDITOR.replace( 'contents' );
</script>
