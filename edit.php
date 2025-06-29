<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari URL
$id = $_GET["id"];

// ambil data mahasiswa berdasarkan id
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$data = mysqli_fetch_assoc($result);

// cek apakah tombol submit ditekan
if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $nrp = $_POST["nrp"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $gambar = $_POST["gambar"];

    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diubah!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengubah data!');
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
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
          <h2 class="ms-4" style="color:white;">Tambah Data</h2>
        </nav>
        <nav class="navbar ps-5" style="background-color: #e3f2fd;padding:5px;" data-bs-theme="light">
          <h3><a href=""Tambah Data></a></h3>
        </nav>
    </div>
       <form action="" method="POST">
          <legend class="ps-4 pe-4">Edit Data</legend>
          <div class="mb-3 ps-4 pe-4">
            <label for="nama" class="form-label">Name</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama']; ?>" required>
          </div>
          <div class="mb-3 ps-4 pe-4">
            <label for="nrp" class="form-label">NRP</label>
            <input type="number" name="nrp" id="nrp" class="form-control" value="<?= $data['nrp']; ?>" required>
          </div>
          <div class="mb-3 ps-4 pe-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $data['email']; ?>" required>
          </div>
          <div class="mb-3 ps-4 pe-4">
            <label for="jurusan" class="form-label">Faculty</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $data['jurusan']; ?>" required>
          </div>
          <div class="mb-3 ps-4 pe-4">
            <label for="gambar" class="form-label">Picture</label>
            <input type="text" name="gambar" id="gambar" class="form-control" value="<?= $data['gambar']; ?>" required>
          </div>
          <a href="index.php" class="btn btn-secondary ms-4">Back</a>
          <button type="submit" name="submit" class="btn btn-success ms-2">Save</button>
        </form>
    </div>
</body>
</html>