<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

include("../model/db.php"); 
$con = connection(); 
$sql = "DELETE FROM users WHERE id = $id";
$con->query($sql);
}

header("location: adminPanel.php");
exit;

?>