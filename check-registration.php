<?php
include("db.php");
$con = connection();
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $same_email_sql = "SELECT * FROM users where email = '$email'";
    $same_email = mysqli_query($con , $same_email_sql);

    if($name == "" || $password == "" || $email == "" || $confirmpassword == ""){
        echo "<script>alert('All Fields are Required')</script>";
        echo "<script>window.location='register.php'</script>";
        exit;
    }
    elseif($password != $confirmpassword){
        echo "<script>alert('Password Must Be Same As Confirmed Password')</script>";
       echo "<span style= 'color:red;'>Password Must Be Same As Confirmed Password</span>";
        echo "<script>window.location='register.php'</script>";
        exit;
    }
    elseif(mysqli_num_rows($same_email) > 0){
        echo "<script>alert('This Email has already taken')</script>";
        echo "<script>window.location='register.php'</script>";
        exit;
    }
    
 
    //$pass = password_hash($password, PASSWORD_BCRYPT);
    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password, usertype) VALUES ('$name', '$email', '$password', '$usertype')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Registration Successful')</script>";
        echo "<script>window.location='login.php'</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
