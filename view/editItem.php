<?php
include("../model/db.php"); 

$con = connection(); 

$id = "";
$name = "";
$description = "";
$img_path = "";
$quantity = 0;

$errormsg = "";
$successmsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        
        $errormsg = "Item ID is missing";
    } else {
        $id = $_GET["id"];

        
        $sql = "SELECT * FROM items WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
    
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $description = $row["description"];
            $img_path = $row["img_path"];
            $quantity = $row["quantity"];
        } else {
            
            $errormsg = "Item not found";
        }
        $stmt->close();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $img_path = $_POST["img_path"];
    $quantity = $_POST["quantity"];

    if (empty($name) || empty($description) || empty($img_path) || empty($quantity)) {
        $errormsg = "All the fields are required";
    } else {
        
        $sql = "UPDATE items SET name = ?, description = ?, img_path = ?, quantity = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssii", $name, $description, $img_path, $quantity, $id);
        if ($stmt->execute()) {
            $successmsg = "Updated successfully";
            $stmt->close();
            header("Location: InventoryItem.php"); 
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
    <title>Edit Items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Items</h2>

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
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">IMG</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="img_path" value="<?php echo $img_path; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
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
