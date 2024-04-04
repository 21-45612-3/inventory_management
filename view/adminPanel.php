<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container my-5">
   <h2>List of Users</h2> 
    <a class="btn btn-primary" href="createUser.php" role="button">Create</a> 
    <br>
    <table class="table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>User Type</th> 
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
    $sql = "SELECT * FROM users";
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
        <td>{$row['email']}</td>
        <td>{$row['password']}</td>
        <td>{$row['usertype']}</td>
        <td>
        <a class=\"btn btn-primary btn-sm\" href=\"editUser.php?id={$row['id']}\">Edit</a>
        <a class=\"btn btn-danger btn-sm\" href=\"deleteUser.php?id={$row['id']}\">Delete</a>

        </td>
        </tr>";
    }
    ?>
   
</tbody>
    </table>
    <br><br>
<div>


   <h2>List of Inventories</h2> 
    <a class="btn btn-primary" href="createInventory.php" role="button">Create</a> 
    <br>
    <table class="table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>

<tbody>
    <?php
    

    //check connection
    if($con->connect_error){
        die("Connection failed: ".$con->connect_error);
    }

    //read all from DB table
    $sql = "SELECT * FROM inventories";
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
        <td>
        <a class=\"btn btn-primary btn-sm\" href=\"InventoryItem.php?id={$row['id']}\">Items</a>
        <a class=\"btn btn-primary btn-sm\" href=\"editInventory.php?id={$row['id']}\">Edit</a>
        <a class=\"btn btn-danger btn-sm\" href=\"deleteInventory.php?id={$row['id']}\">Delete</a>

        </td>
        </tr>";
    }
    ?>
   
</tbody>
    </table>
</div>
<br><br>
<a href="logout.php">Log Out</a>
</body>
</html>
