<!-- index page for admin purpose -->
<!-- guna MySQLi for connection -->
<!-- Without function method -->

<?php 
// connect to databse
// Guna mysqli_connect
// localhost, namaAdmin, password(biar kosong), nameOfDatabase 'Ada 4 parameter'
$link = mysqli_connect("localhost", "root", "", "phpdasar");

// Take data from student / query data 'Ada 2 parameter'
$result = mysqli_query($link, "SELECT * FROM mahasiswa");

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
    <title>Admin page</title>
    <style>
        body {
            animation: moveBackground 10s infinite linear; /* Adjust the duration and other parameters as needed */
        }

        @keyframes moveBackground {
            0% {
                background-position: 0% 0%;
            }
            100% {
                background-position: 100% 0%;
            }
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white; /* Set a background color for the table */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50; /* Set a background color for the header */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Set a background color for even rows */
        }
    </style>
</head>
<body>
    <center>
    <h1>Student Management</h1>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr> <!-- highlight and command press D and change -->
     <!--   <th>No.</th> -->
            <th>Update</th>
            <th>Photo</th>
            <th>ID number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
        </tr>

        <!-- <//?php $i;?> Ni ID aku hide jp sbb lari dgn database-->
        <?php while( $row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <!-- <td><//?= $i; ?></td> -->
            <td>
                <a href="">Change</a>   |  
                <a href="">Delete</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="90"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++;?>
        <?php endwhile; ?>
    </table>
</body>
</html>

