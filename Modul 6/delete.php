<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'modul6');
    // mengambil data dari URL
    $kode_barang = $_GET['kode_barang'];
    // menghapus data
    $hapus = "DELETE FROM barang WHERE kode_barang='$kode_barang'";
    $data = mysqli_query($conn, $hapus);
    // jika ada row yang terpengaruh, lebih dari 0 maka data terhaous
    if ($data>0) {
        echo "<script>
        alert('Terhapus!');
        document.location.href='form.php';
    </script>";
    } else {
        echo "<script>
        alert('Gagal!');
        document.location.href='form.php';
    </script>";
    }
?>