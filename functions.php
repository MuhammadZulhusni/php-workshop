<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "root", "phpdasar");

// Check if the connection was successful
if (!$conn) {
    // Output error message and stop script execution if the connection fails
    die("Connection failed: " . mysqli_connect_error());
}

// Function Definition
function query($query){
    global $conn;
    // Query Execution
    $result = mysqli_query($conn, $query);
    // Fetching Results
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// function add data
function add($data) {
    global $conn; // htmlspecialchars ni important in term of security cause nk elak dari kene kacau masa user insert form "mcm distrup dari code html di form
    $nrp = htmlspecialchars($data["nrp"]);
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //Upload photo dlu
    $gambar = upload();
    if( !$gambar){
        return false;
    }

    // Query insert data
    $query = "INSERT INTO mahasiswa (nrp, name, email, jurusan, gambar) 
    VALUES ('$nrp', '$name', '$email', '$jurusan', '$gambar')";
    // Execute the query
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Function upload file
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Check if no image is uploaded and display an alert message
    if($error === 4){
        echo"
        <script>
            alert('Choose a file first!');
        </script>";
        return false;
    }

    // Check if the uploaded file is a photo or not and display an alert message if not
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo"
        <script>
            alert('You did not upload a valid photo!');
        </script>";
        return false;
    }

    // Check if the size of the file is too big and display an alert message if it is
    if($ukuranFile > 10000000){
        echo"
        <script>
            alert('The photo size is too big!');
        </script>";
        return false;
    }

    // Generate a unique name for the file
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // Move the uploaded file to the img/ directory with the new name
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}


// function delete data
function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// function edit data
function edit($data){
    global $conn;
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    // check if user choose new photo or not
    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    } else{
        $gambar = upload();
    }

    // Query update data
    $query = "UPDATE mahasiswa SET 
                nrp = '$nrp', 
                name = '$name', 
                email = '$email', 
                jurusan = '$jurusan', 
                gambar = '$gambar' 
            WHERE id = $id";

    // Execute the query
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function search data
function search($keyword){
    $query = "SELECT * FROM mahasiswa
    WHERE 
    name LIKE '%$keyword%' OR 
    nrp LIKE '%$keyword%' OR 
    name LIKE '%$keyword%' OR 
    email LIKE '%$keyword%' OR 
    jurusan LIKE '%$keyword%' 
    "; // ni element penting kalau nk buat search

    return query($query);
}


// Function registration
function registration($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE
    username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('Sorry username already registered. Create other username');
        </script>
        ";
        return false; // supaya x masuk dlm database
    }

    // Check confirmation pass
    if($password !== $password2) {
        echo"
        <script>
            alert('Confirmation password not valid. Try again!');
        </script>
        ";
        return false;
    }

    //Encryption dulu password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //Insert ke database
    mysqli_query($conn, "INSERT INTO user (username, password) 
    VALUES('$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>