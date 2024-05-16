<?php 
session_start();
// Suruh page login first open
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
// Check button submit ditekan belum lagi
if (isset($_POST["submit"])) {
    // Check if data has been added successfully
    if (add($_POST) > 0) {
        echo" 
        <script> 
        alert('Successfull added');
        document.location.href='index.php' 
        </script>
        ";
    } else {
        $errorMessage = "Failed to add data";
        $errorMessage .= "<br>" . mysqli_error($conn); // Display any errors
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add.css">
    <title>Add Student</title>
</head>

<body class="bg-light">
    <video src="vd/ocean.mp4" autoplay loop muted playsinline></video>
    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
        <h1 class="fs-2">Add Student Data</h1>
            <div class="form-group">
                <label for="nrp">ID Number:</label>
                <input type="text" name="nrp" id="nrp" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Course:</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </div>
            <div class="form-group">
                <label for="gambar">Photo:</label>
                <input type="file" name="gambar" id="gambar">
            </div> 
            <br>
            <button type="submit" name="submit" class="btn btn-outline-primary">Add Data</button>

            <div class="text-center mt-3">
                <?php
                // Display error message if ada problem
                echo '<div class="text-danger">' . $errorMessage . '</div>';
                ?>
            </div>

        <div class="text-center mt-3">
            <a href="index.php">Back</a>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
