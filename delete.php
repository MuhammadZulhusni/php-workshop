<?php 
session_start();
// Suruh page login first open
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php'; // call page functions

$id = $_GET["id"];

if( delete($id) > 0){
    echo "
    <script> 
        alert('Successfull delete the data');
        document.location.href='index.php' 
    </script>
    ";
} else{
    echo"
    <script> 
        alert('Unsuccessfull delete the data');
        document.location.href='index.php' 
    </script>
    ";
}
?>