
<?php
require_once "vendor/autoload.php";
include "dashboard.php";
use App\Connection;
$db = new Connection();
$conn = $db->connect();

$page=$_GET['page'];
if($page == "" || $page == "1"){
    $page1=0;
}else{
    $page1 =($page*10)-10;
}
$list=$conn->prepare("SELECT * FROM Blogs WHERE User_id={$_SESSION['id']} LIMIT $page1,10");
$list->execute();


?>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

<link href="Classes/CSS/Addblogs.css" rel="stylesheet">
<link href="/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
</script>
    <div class="container">
        <h3>
            <?php echo "Welcome to your home {$_SESSION['username']}" ?>
        </h3>
        <div class="container2">
            <form action="Export.php" method="post">
                <button name="export" id="export" class="export">Export Data</button>
            </form>

        </div>
        <a class="information">
            <table>
                <tr>
                    <th>Title</th>
                    <th>OverView</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th style="text-align: center">Action</th>
                </tr>
                <?php
                ?>
                <?php while ($lists = $list->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $lists['Title']?></td>
                    <td><?php echo $lists['Overview']?></td>
                    <td><?php echo $lists['Content']?></td>
                    <td><?php echo $lists['Date']?></td>
                    <td style="display: flex;
                         justify-content: space-around">
                        <button class="edit" name="edit"><a href="Update.php?eid=<?php echo $lists['Blog_id'] ?>"><i class="fas fa-edit"></i></a></button>
                        <button name="delete" class="delete"><a href="Delete.php?did=<?php echo $lists['Blog_id'] ?>"><i class="fas fa-trash "></i></a></button>
                    </td>

                </tr>
                <?php } ?>
            </table>
            <div class="pagination">
                <div class="inner">
                    <?php
                    $result=$conn->prepare("select * from Blogs where User_id={$_SESSION['id']}");
                    $result->execute();
                    $results= $result->rowCount();
                    $a=$results/10;
                    $a=ceil($a);
                    if($page > 1 ){
                        echo '<a  href="Dashboard.php?page='.($page - 1).'">Previous</a>';
                    }
                    for($b=1;$b<=$a;$b++){
                        if($b == $page){
                            $active ="active";
                        }else{
                            $active="";
                        }
                        echo '<a class="page-link '.$active.'" href="Dashboard.php?page='.$b.'">'.$b.'</a>';
                    }
                    if($a > $page){
                        echo '<a href="Dashboard.php?page='.($page + 1).'">Next</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>



