<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","phpdasar");

$id = $_GET["id"];

$query = "DELETE FROM mahasiswa WHERE id = $id";
$hapus = mysqli_query($conn,$query);

if($id > 0){
    echo"
    <script>
    alert('Data Berhasil Dihapus');
    window.location.href = 'index.php';
    </script>
    ";
}else{
    echo"
    <script>
    alert('Data Gagal Dihapus');
    </script>
    ";
}

?>