<?php



$name = "";
$description = "";
$img_path = "";
$quantity =0;

$errormsg = "";
$successmsg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $description = $_POST["description"];
    $img_path = $_POST["img_path"];
    $quantity = $_POST["quantity"];

    if(empty($name) || empty($description) || empty($img_path) || empty($quantity)){
        $errormsg = "All the fields are required";
    } else {
        

        include("../model/db.php");
    $con = connection();

    $sql = "INSERT INTO items(name, description, img_path, quantity) VALUES('$name', '$description', '$img_path', '$quantity')";
    $result = $con->query($sql);

    if(!$result){
        $errormsg = "All the fields are required";
        
    }

        $name = "";
        $description = "";
        $img_path = "";
        $quantity = 0;

        $successmsg = "Item added";

        header("location: InventoryItem.php");
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

<form action="" method="post">

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
            <input type="text" class="form-control" name="img_path" placeholder="img path" value="<?php echo $img_path; ?>">
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
