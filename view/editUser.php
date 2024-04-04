<?php
include("../model/db.php"); 

$con = connection(); 

$id = "";
$name = "";
$email = "";
$password = "";
$usertype = "";

$errormsg = "";
$successmsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        // If ID is not set in GET request, display an error message
        $errormsg = "User ID is missing";
    } else {
        $id = $_GET["id"];

        // Retrieve user data from database
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
    
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $email = $row["email"];
            $password = $row["password"];
            $usertype = $row["usertype"];
        } else {
            
            $errormsg = "User not found";
        }
        $stmt->close();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    if (empty($name) || empty($email) || empty($password) || empty($usertype)) {
        $errormsg = "All the fields are required";
    } else {
        // Update users data in the database
        $sql = "UPDATE users SET name = ?, email = ?, password = ?, usertype = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $password, $usertype, $id);
        if ($stmt->execute()) {
            $successmsg = "Updated successfully";
            $stmt->close();
            header("Location: adminPanel.php"); 
            exit;
        } else {
            $errormsg = "Failed to update";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Seller</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit User</h2>

        <?php 
        if (!empty($errormsg)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errormsg</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }

        if (!empty($successmsg)) {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successmsg</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div> 
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">User Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="usertype" value="<?php echo $usertype; ?>">
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
