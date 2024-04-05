<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $targetDir = "../assets/upload/";
    $fileName = basename($_FILES["img_file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowedTypes)) {
        
        if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $targetFilePath)) {
            include("../model/db.php"); 

            $con = connection(); 
            
            $insert = $con->query("INSERT INTO items (img_path) VALUES ('$targetFilePath')");
            if ($insert) {
                echo "The file " . $fileName . " has been uploaded successfully.";
            } else {
                echo "File upload failed, please try again.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
    }
}
?>
