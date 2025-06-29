<?php
//kondeksi ke database
$conn = mysqli_connect("localhost","root","","phpdasar");

if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $nrp = $_POST["nrp"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $gambar = $_POST["gambar"];

    $query = "INSERT INTO mahasiswa(nama,nrp,email,jurusan,gambar)
            VALUES('$nama','$nrp','$email','$jurusan','$gambar')";

    $result = mysqli_query($conn,$query);

    if($result){
        echo "
        <script>
        alert('Data Berhasil Ditambahkan');
        window.location.href = 'index.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Data Gagal Ditambahkan');
        window.location.href = 'tambah.php';
        </script>
        " . mysqli_error($conn);
    }

}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add College Student</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <div>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
          <!-- Navbar content -->
        </nav>
        <nav class="navbar bg-primary ps-5 py-3" data-bs-theme="dark">
          <h2 class="ms-4" style="color:white;">Add Data</h2>
        </nav>
        <nav class="navbar ps-5" style="background-color: #e3f2fd;padding:5px;" data-bs-theme="light">
          <h3><a href=""Tambah Data></a></h3>
        </nav>
    </div>
    <form action="" method="POST">
    <legend class="ps-4 pe-4">Insert Data</legend>
    <div class="mb-3 ps-4 pe-4">
      <label for="nama" class="form-label">Name</label>
      <input type="text" name="nama" id="nama" class="form-control" placeholder="Input Name" required>
    </div>
    <div class="mb-3 ps-4 pe-4">
      <label for="nrp" class="form-label">NRP</label>
      <input id="nrp" type="number" name="nrp" placeholder="NRP Numbers"class="form-select" required>
      </input>
    </div>
    <div class="mb-3 ps-4 pe-4">
      <label for="email" class="form-label">Email</label>
      <input type="text" id="email" name="email"class="form-control" placeholder="Input Email" required>
    </div>
    <div class="mb-3 ps-4 pe-4">
      <label for="jurusan" class="form-label">Faculty</label>
      <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Input Jurusan" required>
    </div>
    <div class="mb-3 ps-4 pe-4">
      <label for="gambar" class="form-label">Picture</label>
      <input type="text" id="gambar" name="gambar" class="form-control" placeholder="IMG" required>
    </div>
    <div class="mb-3 ps-4 pe-4">
    </div>
    <a href="index.php" style="border:none; margin-top:15px; margin-left:10px;"class="btn btn-primary mb-3 ps-4 pe-4 ms-4" name="kembali">Back!</a>
    <button style="border:none; margin-top:15px; margin-left:10px;"class="btn btn-success mb-3 ps-4 pe-4 ms-4" type="submit" name="submit">Save</button>
    </form>
    </div>
</body>
</html>