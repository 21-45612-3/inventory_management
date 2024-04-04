
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container my-5">
   <h2>List of Items</h2> 
    <a class="btn btn-primary" href="createItems.php" role="button">Create</a> 
    <br>
    <table class="table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>IMG</th>
<th>Quantity</th> 
<th>Action</th>
</tr>
</thead>

<tbody>
    <?php
    
    include("../model/db.php");
    $con = connection();

    //check connection
    if($con->connect_error){
        die("Connection failed: ".$con->connect_error);
    }

    //read all from DB table
    $sql = "SELECT * FROM items";
    $result = $con->query($sql);

    if(!$result){
        die("Invalid query: " . $con->error);
    }

    //read data for each row
    while($row = $result->fetch_assoc()){

        echo "
        <tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['description']}</td>
        <td>{$row['img_path']}</td>
        <td>{$row['quantity']}</td>
        <td>
        <a class=\"btn btn-primary btn-sm\" href=\"editItem.php?id={$row['id']}\">Edit</a>
        <a class=\"btn btn-danger btn-sm\" href=\"deleteUser.php?id={$row['id']}\">Delete</a>

        </td>
        </tr>";
    }
    ?>
   
</tbody>
    </table>

    <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="adminPanel.php" role="button">Go Back</a>
        </div>
    
</body>
</html>