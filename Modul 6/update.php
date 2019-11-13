<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA BARANG</title>
    <?php
        require 'konek.php'
    ?>
</head>
    <?php 
        $kode_barang = $_GET['kode_barang'];
        $cari="select * from barang where kode_barang = '$kode_barang'";
        $hasil_cari = mysqli_query($conn, $cari);
        $data = mysqli_fetch_array($hasil_cari);
    ?>
<body>
    <center>
        <h3>Masukkan Data Barang :</h3>
        <table border='0' width='30%'>
            <form action="" method="POST">
                <tr>
                    <td width="25%">Kode Barang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_barang" size="10" value="<?php echo $data['kode_barang'] ?>"> </td>
                </tr>
                <tr>
                    <td width="25%">Nama Barang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_barang" size="10" value="<?php echo $data['nama_barang'] ?>"> </td>
                </tr>
                <tr>
                    <td width="25%">Gudang</td>
                    <td width="5%">:</td>
                    <td width="65%">
                    <select name="kode_gudang">
                    <?php
                    $sql = "SELECT * FROM gudang";
                    $retval = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($retval)) {
                        echo "<option value='$row[kode_gudang]'>$row[nama_gudang]</option>";
                    }    
                    ?>
                    </select>
                    </td>
                </tr>

            
        </table>
        <input type="submit" value="Update" name="submit">
            </form>

            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $kode_gudang = $_POST['kode_gudang'];
            $submit = $_POST['submit'];
            $input = "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', kode_gudang = '$kode_gudang' WHERE kode_barang='$kode_barang'";
            if ($submit) {
                mysqli_query($conn, $input);
                echo "
                    <script>
                        alert('Data Berhasil Diubah!');
                        document.location.href='form.php';
                    </script>";
            }
            ?>
    </center>
    
</body>
</html>