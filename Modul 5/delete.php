<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');
    // mengambil data dari URL
    $nim = $_GET['nim'];
    // menghapus data
    $hapus = "DELETE FROM mahasiswa WHERE NIM='$nim'";
    $data = mysqli_query($conn, $hapus);
    // jika ada row yang terpengaruh, lebih dari 0 maka data terhaous
    if ($data>0) {
        echo "<script>
        alert('Terhapus!');
        document.location.href='latihanform.php';
    </script>";
    } else {
        echo "<script>
        alert('Gagal!');
        document.location.href='latihanform.php';
    </script>";
    }
?>