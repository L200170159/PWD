<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>
</head>
    <?php
        $conn = mysqli_connect('localhost','root','')
    ?>
<body>
<center>
    <h3>Form Mahasiswa</h3>
    <table>
        <form action="latihanform.php" method="POST">
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="NIM" size="10" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="Nama" size="30" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <input type="radio" name="Kelas" value="A" checked>A
                    <input type="radio" name="Kelas" value="B">B
                    <input type="radio" name="Kelas" value="C">C
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="Alamat" size="30" required></td>
            </tr>
            <tr>
                <td colspan='2'></td>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </form>
    </table>
    <?php
    include_once("koneksi.php");

    error_reporting(E_ALL^E_NOTICE);

    $nim = $_POST['NIM'];
    $nama = $_POST['Nama'];
    $kelas = $_POST['Kelas'];
    $alamat = $_POST['Alamat'];
    
    $submit = $_POST['submit'];

    $input = "INSERT INTO mahasiswa (NIM, Nama, Kelas, Alamat) VALUES ('$nim', '$nama', '$kelas', '$alamat')";

    if ($submit) {
        # code...
        if ($nim == "") {
            # code...
            echo "NIM tidak boleh kosong";
        } elseif ($nama == "") {
            # code...
            echo "Nama tidak boleh kosong";
        } elseif ($alamat == "") {
            # code...
            echo "Alamat tidak boleh kosong";
        } else {
            # code...
            mysqli_query ($conn, $input);
            echo  "
            <script>
                alert ('Berhasil!');
            </script>
        ";
        }
    }
?>
<hr>
<h3>Data Mahasiswa</h3>
<table border='1' width='50%'>
    <tr>
        <td align='center' width='20%'><b>NIM</b></td>
        <td align='center' width='30%'><b>Nama</b></td>
        <td align='center' width='10%'><b>Kelas</b></td>
        <td align='center' width='30%'><b>Alamat</b></td>
        <td colspan="2" align="center" >Action</td>
    </tr>
<?php
$cari="select * from mahasiswa order by NIM";
$hasil_cari=mysqli_query($conn,$cari);
while ($data = mysqli_fetch_array($hasil_cari)) {
    echo "<tr>
                <td>$data[NIM]</td>
                <td>$data[Nama]</td>
                <td>$data[Kelas]</td>
                <td>$data[Alamat]</td>
                <td><a href='Update.php?nim=$data[NIM]'>Update</a></td>
                <td><a href='delete.php?nim=$data[NIM]'>Hapus</a></td>
         </tr>";
}
?></center>
</body>
</html>