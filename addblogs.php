<?php
require_once "vendor/autoload.php";
use App\AddBlogs;

include "dashboard.php";
$title=$over=$content=$success="";
if(isset($_POST['add'])){
    $Title=$_POST['title'];
    $Overview=$_POST['overview'];
    $Editor=$_POST['editor'];
    if(empty($Title)){
        $title ="This Field must be not empty";
    }elseif (empty($Overview)){
        $over ="This Field must be not empty";
    }elseif (empty($Editor)){
        $content ="This Field must be not empty";
    }else{
        $add =new AddBlogs();
        $add->Add($Title,$Overview,$Editor);
        $success= "Recorded to database";
    }

}
?>
<link href="Classes/CSS/Addblogs.css" rel="stylesheet">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div class="wrapp">
    <div class="container1">
        <form action="" method="post">
            <label for="first">Title </label>
            <input id="first" type="text" name="title" placeholder="Enter title"/>
            <?php echo "$title"?>
            <label for="second">Overview </label>
            <input id="second" type="text" name="overview" placeholder="Enter Overview"/>
            <?php echo "$over"?>
            <label for="third">Content </label>
            <textarea  id="third" name="editor" rows="10" cols="30" placeholder="Enter Content"></textarea>
            <?php echo "$content"?>
            <button name="add" class="add">Add</button>
            <div class="center" style="color: #3e3e3e;font-family:'Samyak Gujarati',serif;font-weight: lighter">
                <?php echo "$success"?>
            </div>

        </form>
    </div>

</div>

<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>
