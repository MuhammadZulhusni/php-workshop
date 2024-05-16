<?php
require 'functions.php';

if(isset($_POST["register"]) ) {
    if (registration($_POST) > 0) {
        echo "
        <script>
        alert('User successfully added');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<video id="background-video" src="vd/register.mp4" autoplay loop muted playsinline></video>

<br></br>

<div class="container mt-5">

    <form action="" method="post" class="form-container" style="max-width: 400px; margin: auto;">
    <h1 class="text-center text-black">Registration</h1> <br>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password2">Confirm password:</label>
            <input type="password" name="password2" id="password2" class="form-control">
        </div>
        <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
