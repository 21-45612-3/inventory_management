<?php
$name = "";
$description = "";
$quantity = 0;

$errormsg = "";
$successmsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];

    // File upload handling
    $targetDir = "../assets/upload/";
    $fileName = basename($_FILES["img_file"]["name"]);
    $targetFilePath =  $targetDir . $fileName ;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (empty($name) || empty($description) || empty($quantity)) {
        $errormsg = "All the fields are required";
    } elseif (!in_array($fileType, $allowedTypes)) {
        $errormsg = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
    } else {
        // Database connection and insertion
        include("../model/db.php");
        $con = connection();

        if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $targetFilePath)) {


            $sql = "INSERT INTO items (name, description, img_path, quantity) VALUES ('$name', '$description', '$targetFilePath', '$quantity')";
            if ($con->query($sql)) {
                $successmsg = "Item added successfully.";

               
                // Reset form values
                $name = "";
                $description = "";
                $quantity = 0;
                header("Location: InventoryItem.php"); 
            } else {
                $errormsg = "Error inserting into database: " . $con->error;
            }
        } else {
            $errormsg = "Sorry, there was an error uploading your file.";
        }
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

<h2>New Item</h2> 

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

<form action="" method="post" enctype="multipart/form-data">

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name; ?>">
        </div>
    </div> 
    
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Description" name="description" value="<?php echo $description; ?>">
        </div>
    </div>



    
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">IMG</label>
        <div class="col-sm-6">
            <input type="file" class="form-control" name="img_file" placeholder="img path">
        </div>
    </div>
 



    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Quantity</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="InventoryItem.php" role="button">Cancel</a>
        </div>
    </div>
</form>
</div>

</body>
</html>
