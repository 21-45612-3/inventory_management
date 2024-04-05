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
    
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>IMG</th>
                <th>Quantity</th> 
            
            </tr>
        </thead>

        <tbody>
            <?php
            include("../model/db.php");
            $con = connection();

            // Check connection
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // Read all records from DB table
            $sql = "SELECT * FROM items";
            $result = $con->query($sql);

            if (!$result) {
                die("Invalid query: " . $con->error);
            }

            // Display data for each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><img src="<?php echo $row['img_path']; ?>" width="200" height="150"></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>
                       
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <div class="col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="adminPanel.php" role="button">Go Back</a>
    </div>
    
</body>
</html>
