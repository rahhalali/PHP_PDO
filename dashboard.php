<?php
session_start();
$welcome="";
if(isset($_SESSION['username'])){
    $welcome= "{$_SESSION['username']}";
}else{
    header("location:index.php");
}
?>
<link href="Classes/CSS/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="menu" tabindex="0">
    <div class="smartphone-menu-trigger"></div>
    <header class="avatar">
        <h2><?php echo "$welcome"?></h2>
    </header>
    <ul>
        <li tabindex="0" class="icon-dashboard"><a href="Dashboard.php">Dashboard<i class="fas fa-tachometer-slowest"></i></a></li>
        <li tabindex="0" class="icon-customers"><a href="addblogs.php">Add Blogs</a></li>
        <li tabindex="0" class="icon-users"><a href="Addfiles.php">Add Files</a></li>
        <li tabindex="0" class="icon-sign-out"><a href="logout.php">Log out</a></li>
    </ul>
</nav>
