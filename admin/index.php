<?php


    session_start();
    $noNavbar='';
    if(isset($_SESSION['Username'])){
        header('Location: dashboard.php');
    }
    include('init.php');
    

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $userName=$_POST['user'];
        $password=$_POST['pass'];
        $hashedPass=sha1($password);

        //check in data base
        
        $stmt=$conn->prepare("SELECT UserName, Password FROM users WHERE UserName = ? AND Password=? AND GroupID=1 ");
        $stmt->execute(array($userName,$hashedPass));
        $count=$stmt->rowCount();
        
        if($count>0){
            echo $count;
            $_SESSION['Username']=$userName;
            header('Location: dashboard.php');
            exit();
        }


    }
    
?>


<form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST" class="login">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control " type="text" name="user" placeholder="UserName" autocomplete="off">
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
    <input class="btn btn-block btn-primary" type="submit" value="Login" name="submit">

</form>

<?php  
include('init.php');
    include($template."footer.php");
?>