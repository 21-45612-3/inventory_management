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
        $sql="SELECT  * FROM users where email='$email'and password='$password'";
        $result = mysqli_query($con,$sql);
        if ($result){
            $num=mysqli_num_rows($result);
            if($num>0){
        $_SESSION['email']= $email;
        header("location: ../view/home.php");
        }
        else{
            echo"<script> alert('invalid credentials');</script>";
       echo "<script>window.location='../view/login.php'</script>";
         }
        }
    }
?>

<?php 


