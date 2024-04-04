<?php 
    session_start();
    include '../model/db.php';
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if($email == "" || $password == "" ){
        echo"<script> alert('null email or password!');</script>";
       echo "<script>window.location='../view/login.php'</script>";
    }
    else{
     
       $con = connection();
        $sql="SELECT  * FROM users where email='$email'and password='$password' and usertype = 'admin'";
        $result = mysqli_query($con,$sql);
        $sql1="SELECT  * FROM users where email='$email'and password='$password' and usertype = 'user'";
        $result1 = mysqli_query($con,$sql1);
        
        if ($result){
            $num=mysqli_num_rows($result);
            if($num>0){
        $_SESSION['email']= $email;
        header("location: ../view/adminPanel.php");
        }
        elseif($result1){
            $num=mysqli_num_rows($result1);
            if($num>0){
        $_SESSION['email']= $email;
        header("location: ../view/userHome.php");

        }
        
        else{
            echo"<script> alert('invalid credentials');</script>";
       echo "<script>window.location='../view/login.php'</script>";
         }
        }
    }}
?>




