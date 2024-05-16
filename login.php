<?php 
session_start();

// Check cookie (Remember me)
if( isset($_COOKIE['login'])){
    if( $_COOKIE['login'] == 'true'){
        $_SESSION['login'] = true;
    }
}
// user xleh back to login page selepas login
if( isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require 'functions.php';
// Check button submit
if(isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE
    username = '$username'");

    // Check username
    if(mysqli_num_rows($result) === 1){
        // Check password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            // set session
            $_SESSION["login"] = true;
            // Check remeber me
            if( isset($_POST['remember'])){
                //buat cookie
                setcookie('login', 'true', time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }
    // Invalid username or password
    echo "
    <script>
        alert('Invalid username or password');
    </script>
    ";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<video id="background-video" src="vd/register.mp4" autoplay loop muted playsinline></video>

<br>
<div class="container mt-5">
    <form action="" method="post" class="form-container" style="max-width: 400px; margin: auto;">
        <h1 class="text-center text-black">Login</h1>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
