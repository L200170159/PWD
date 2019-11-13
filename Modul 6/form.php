<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang</title>
</head>
<?php
    require 'konek.php'
?>
<body>
    <center>
        <h3>Masukan data barang:</h3>
        <form method="POST" action="form.php">
        <table border="0" widt='30%'>
            
                <tr>
                    <td width='25%'>Kode Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="kode_barang" size="10" required></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Barang</td>
                    <td widht='5%'>:</td>
                    <td width='65%''><input type="text" name="nama_barang" size="10" required></td>
                </tr>
                <tr>
                    <td width='25%'>Gudang</td>
                    <td width='5%'>:</td>
                    <td><select name='kode_gudang'>
                        <?php
                        $sql = "select * from gudang";
                        $retval = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($retval)){
                            echo "<option value='$row[kode_gudang]'>$row[nama_gudang]</option>";
                        }
                        ?>
                    </select>
                    </td>
                </tr>
            

        </table>
        <input type="submit" value="Masukan" name="submit">
    </form>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kode_gudang = $_POST['kode_gudang'];
    $submit = $_POST['submit'];
    $input = "insert into barang (kode_barang, nama_barang, kode_gudang) values ('$kode_barang', '$nama_barang','$kode_gudang')";
    if ($submit) {
        mysqli_query($conn,$input);
        echo'<br>Data berhasil dimasukan';
    }
    ?>
    <hr>
    <h3>Data Barang</h3>
    <table border="1" width='50%'>
        <tr>
            <td align="center" width='20%'><b>Kode Barang</b></td>
            <td align="center" width='30%'><b>Nama Barang</b></td>
            <td align="center" width='10%'><b>Lokasi Gudang</b></td>
            <td align="center" colspan='2' width='20%'>Action</td>
        </tr>
<?php
$cari="select * from barang, gudang where barang.kode_gudang = gudang.kode_gudang";
$hasil_cari = mysqli_query($conn,$cari);
while($data=mysqli_fetch_row($hasil_cari)){
    echo"
    <tr>
    <td width='20%' align='center'>$data[0]</td>
    <td width='30%'>$data[1]</td>
    <td width='10%' align='center'>$data[2]</td>
    <td><a href='Update.php?kode_barang=$data[0]'>Update</a></td>
    <td><a href='delete.php?kode_barang=$data[0]'>Hapus</a></td>
    </tr>";
}
?>
    </table>
    </center>
    
</body>
</html>