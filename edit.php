<?php 
session_start();
// Suruh page login first open
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];
// query data student based on id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// Check button submit ditekan belum lagi
if (isset($_POST["submit"])) {
    // Check if data has been update successfully
    if (edit($_POST) > 0) {
        echo" 
        <script> 
        alert('Successfull updated');
        document.location.href='index.php' 
        </script>
        ";
    } else {
        $errorMessage = "";
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
    <link rel="stylesheet" href="css/edit.css">
    <title>Update Student Information</title>
</head>

<body class="bg-light">
    <video src="vd/ocean.mp4" autoplay loop muted playsinline></video>
    <div class="container mt-3">

        <form action="" method="post" enctype="multipart/form-data">
        <!-- hidden input -->
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
        
        <h1 class="fs-2">Update Student Data</h1>
            <div class="form-group">
                <label for="nrp">ID Number:</label>
                <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= $mhs["name"]; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Course:</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Photo:</label>
                <center><img src="img/<?= $mhs['gambar']; ?>" width="150 pixels" height="100 pixels"></center>
                <input type="file" name="gambar" id="gambar">
            </div> 
            <button type="submit" name="submit" class="btn btn-outline-primary">Update Data</button>

        <div class="text-center mt-3">
            <a href="index.php">Back</a>
        </div>

        <div class="text-center mt-3">
                <?php
                // Display error message
                echo '<div class="text-danger">' . $errorMessage . '</div>';
                ?>
        </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
