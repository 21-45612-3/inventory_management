<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Home | INV MNG SYS</title>

        <link href="../assets/css/styles.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-expand-lg fixed-top" style="background: linear-gradient(0deg, #C8DBED 35%, #9BBBDA 100%);">
            <div class="container px-4 px-lg-5">

                <a class="navbar-brand" href="#!">INV MNG<sup>sys</sup></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Sign In</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <section>
        <h2>List of Inventories</h2> 
    
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
    

       
    include("../model/db.php");
    $con = connection();
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
        <a class=\"btn btn-primary btn-sm\" href=\"InventoryItemUser.php?id={$row['id']}\">Items</a>
        

        </td>
        </tr>";
    }
    ?>
   
</tbody>
    </table>
</div>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
</html>