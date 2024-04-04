<?php



$name = "";
$email = "";
$password = "";
$usertype = "";

$errormsg = "";
$successmsg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    if(empty($name) || empty($email) || empty($password) || empty($usertype)){
        $errormsg = "All the fields are required";
    } else {
        // Process form data here
        
        // Assuming successful processing, reset form fields

        include("../model/db.php");
    $con = connection();

    $sql = "INSERT INTO users(name, email, password, usertype) VALUES('$name', '$email', '$password', '$usertype')";
    $result = $con->query($sql);

    if(!$result){
        $errormsg = "All the fields are required";
        
    }

        $name = "";
        $email = "";
        $password = "";
        $usertype = "";

        $successmsg = "Seller added";

        header("location: adminPanel.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5">

<h2>New User</h2>

<?php 
    if(!empty($errormsg)){
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errormsg</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }

    if(!empty($successmsg)){
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$successmsg</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
?>

<form action="" method="post">

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name; ?>">
        </div>
    </div> 
    
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $password; ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">User Type</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="usertype" placeholder="Write either admin or user" value="<?php echo $usertype; ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="adminPanel.php" role="button">Cancel</a>
        </div>
    </div>
</form>
</div>

</body>
</html>
