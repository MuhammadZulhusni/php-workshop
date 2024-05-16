<!-- index page for admin purpose -->
<!-- guna MySQLi for connection -->
<!-- Using function -->
<!-- So far dh belajar GET, Add(INSERT), Delete, Update, Search -->
<!-- Dalam ni ada bootstrap -->
<!-- pagination is nombor yg bawah table 1,2,3 -->
<?php 
session_start();
// Suruh page login first open
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
// connect to databse
// Guna mysqli_connect
// localhost, namaAdmin, password(biar kosong), nameOfDatabase 'Ada 4 parameter'
// $link = mysqli_connect("localhost", "root", "", "phpdasar");
require 'functions.php'; // require ni call function file

// Buat pagination (Kurang fhm kene bnyk exercise lg part ni)
$jumlahDataPerHalaman = 5; // Number of data per page
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman "); // ORDER BY id DESC susun paling latest dkt ats, ASC paling lama dkt atas.
// If button search di click
if(isset($_POST["search"]) ){
    $mahasiswa = search($_POST["keyword"]);
}
// Take data from student / query data 'Ada 2 parameter'
// $result = mysqli_query($link, "SELECT * FROM mahasiswa");

// Ambil data student from object/variable 'result'
// 1. mysqli_fetch_row()
// var_dump($mhs[3]);
// 2. mysqli_fetch_assoc()
// var_dump($mhs["jurusan"]);
// 3. mysqli_fetch_array()
// var_dump($mhs[4]);
// 4. mysqli_fetch_object()
// var_dump($mhs->name);

// Guna while sbb nk display semua data yg 'name' only kalau nk semua buang []
// while( $mhs = mysqli_fetch_assoc($result) ){
//    var_dump($mhs);
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<video src="vd/register.mp4" autoplay loop muted playsinline></video>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="btn btn-primary" href="index.php">Student Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Select
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="add.php">New Student</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form class="d-flex" role="search" action="" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="searchInput">
            <button class="btn btn-outline-primary" type="submit" name="search">Search</button>
            </form>
      </form>
    </div>
    </nav>
    <table border="1" cellpadding="12" cellspacing="0">
        <tr>
            <th class="text-center">Action</th>
            <th class="text-center">Photo</th>
            <th class="text-center">ID Number</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Course</th>
        </tr>
        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td class="text-center"> <!-- delete.php?id=   ni if nk delete kpd specific data based on id -->
                <a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-outline-primary">Change</a> 
                <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure want to delete this data?');" class="btn btn-outline-primary">Delete</a>
            </td>
            <td class="text-center"><img src="img/<?= $row["gambar"]; ?>" width="150 pixels" height="100 pixels"></td>
            <td class="text-center"><?= $row["nrp"]; ?></td>
            <td class="text-center"><?= $row["name"]; ?></td>
            <td class="text-center"><?= $row["email"]; ?></td>
            <td class="text-center"><?= $row["jurusan"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>


    <div class="pagination-container">
        <?php if ($halamanAktif > 1) : ?>
            <div class="pagination-prev-next">
                <a href="?page=<?= $halamanAktif - 1; ?>">&lt; Previous</a>
            </div>
        <?php endif; ?>

        <ul class="pagination">
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <li class="pagination-item">
                    <a href="?page=<?= $i; ?>" <?= ($i == $halamanAktif ? 'class="active"' : ''); ?>>
                        <?= $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <div class="pagination-prev-next">
                <a href="?page=<?= $halamanAktif + 1; ?>">Next &gt;</a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


