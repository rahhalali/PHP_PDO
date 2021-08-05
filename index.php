<?php
require_once "vendor/autoload.php";
session_start();
use App\Connection;
use App\User;

$name_error =$password_error= $name_user =$user_password = $email_user="";
$All="";
$username=$Email=$Password=$_Error=$_Suc='';
    if(isset($_POST["btn"])){
        if(empty($_POST["Name"])){
            $name_error = "please filled the full Name";
            $All= "Some fields are empty";
        }
        if(empty($_POST["Email"])){
            $email_user ="please fill the email filled";
            $All=$All ." and Email fields";
        }
        if(empty($_POST["Password"])){
            $password_error="please filled the full Password";
            $All=$All ." and the password";
        }
        if(!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Password"])){
            $password = $_POST['Password'];
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase) {
                $msg = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            } else {
                $msg = "Your password is strong.";
                $user =new User();
                $user->store($_POST['Name'],$_POST['Email'],$_POST['Password']);
            }

        }
    }
    if(isset($_POST["btn1"])){
            if(empty($_POST['name'])){
                $username="Enter username or email";
            }elseif (empty($_POST['password'])){
                $Password ="Enter Password";
            }else{
                try{
                    $db = new Connection();
                    $conn = $db->connect();
                    $select_stmt=$conn->prepare("SELECT Id,Username,Email,Password from Users WHERE Username=:uname OR Email=:uemail");
                    $select_stmt->execute(array('uname'=>$_POST['name'],'uemail'=>$_POST['name']));
                    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
                    if($select_stmt->rowCount()>0) {
                        if ($_POST['name'] == $row['Username'] OR $_POST['name'] == $row['Email']) {
                            if (password_verify(($_POST['password']),$row['Password'])){
                                $_SESSION['id']=$row['Id'];
                                $_SESSION['username']=$row['Username'];
                                header("location:dashboard.php");
                            }else{
                                $_Error="Username and Password not matching";
                            }
                        }
                    }
                }catch (PDOException $e){
                }

            }
    }

?>
<link href="Classes/CSS/User.css" rel="stylesheet">
<h2>Hello there we will be happy for having you.</h2>
<?php echo "$All "?>
<?php echo "$msg" ?>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="index.php" method="post" autocomplete="off">
            <h1>Create Account</h1>
            <?php echo  "$name_error"; ?>
            <input type="text" name="Name" placeholder="Name" />
            <?php echo  "$email_user"; ?>
            <input type="email" name="Email" placeholder="Email" />
            <?php echo  "$password_error"; ?>
            <input type="password" name="Password" placeholder="Password" />
            <button name="btn" type="submit" type="submit">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="index.php" method="post" autocomplete="off">
            <h1>Sign in</h1>
                <?php echo "$_Suc"?>
                <?php echo "$username";  ?>
            <input type="name/email" name="name"  placeholder="Username/Email" />
            <?php echo "$Password";  ?>
            <input type="password" name="password" placeholder="Password" />
            <button  name="btn1">Sign In</button>
            <?php echo "$_Error"?>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<footer>
    <p>
        Created with <i class="fa fa-heart"></i> by
        <a target="_blank" href="https://www.facebook.com/rahalinho.rahhal.7/">Ali Rahhal</a>
    </p>
</footer>
 <script src="Classes/JS/User.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>