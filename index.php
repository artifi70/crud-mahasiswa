<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost","root","","phpdasar");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

$mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
          <!-- Navbar content -->
        </nav>
        <nav class="navbar bg-primary ps-5 py-3" data-bs-theme="dark">
          <h2 style="color:white;">List Of College Student CRUD</h2>
        </nav>
        <nav class="navbar ps-5" style="background-color: #e3f2fd;padding:5px;" data-bs-theme="light">
          <h3><a href=""Tambah Data></a></h3>
        </nav>
        <a href="tambah.php" style="border:none; margin-top:15px; margin-left:10px;"class="btn btn-primary mb-3 ms-4" type="submit">Add Data!</a>
        <table class="table caption-top" border="1">
            <tr>
                <th class="ps-5" >No</th>
                <th class="ps-5" >Name</th>
                <th class="ps-5" >NRP</th>
                <th class="ps-5" >Email</th>
                <th class="ps-5" >Faculty</th>
                <th class="ps-5" >Picture</th>
                <th class="ps-5" >Action</th>
            </tr>
            <?php $i=1 ;?>
            <?php foreach($mahasiswa as $mhs):?>
            <tr>
                <td class="ps-5"><?= $i;?></td>
                <td class="ps-5"><?= $mhs["nama"];?></td>
                <td class="ps-4"><?= $mhs["nrp"];?></td>
                <td class="ps-3"><?= $mhs["email"];?></td>
                <td class="ps-3"><?= $mhs["jurusan"];?></td>
                <td class="ps-4">
                    <img style="width:100px; border-radius:10px;" src="img/<?= $mhs["gambar"];?>" alt="singa">
                </td>
                <td>
                    <a href="edit.php?id=<?= $mhs["id"];?>" style="border:none; margin-top:15px; margin-left:10px;"class="btn btn-success " type="edit" name="edit"><i class="bi bi-pencil"></i></a>
                    <a href="hapus.php?id=<?= $mhs["id"];?>" style="border:none; margin-top:15px; margin-left:10px;"class="btn btn-primary bg-danger" type="hapus" name="hapus"><i class="bi bi-trash3"></i></a>
                </td>
            </tr>
            <?php $i++ ;?>
            <?php endforeach ;?>
        </table>
    </div>
    
    
</body>
</html>