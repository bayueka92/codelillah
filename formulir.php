<h3> Data Form</h3>
<form action="" method="post">
    <table>
        <tr>
            <td width="130"> Nama </td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td> NRP </td>
            <td><input type="text" name="nrp"></td>
        </tr>
        <tr>
            <td> Kelas </td>
            <td><input type="text" name="kelas"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="proses" value="Simpan"></td>
        </tr>
    </table>
</form>
<h3> Data barang </h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Barang </th>
        <th>Nama Barang </th>
        <th>Harga</th>
        <th colspan="2">Aksi</th>
    </tr>

    <?php
    include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");
    while($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama]</td>
            <td>$tampil[nrp]</td>
            <td>$tampil[kelas]</td>
            <td><a href='?kode=$tampil[nama]'> Hapus </a></td>
            <td><a href='barang-ubah.php?kode=$tampil[nama]'> Ubah </a></td>
        <tr>";
        $no++;
    }
    ?>
    </table>

    <?php
    include "koneksi.php";

    if(isset($_GET['kode'])){
    mysqli_query($koneksi,"delete  from barang where kode_barang='$_GET[kode]'");
    
    echo "Data berhasil dihapus";
    echo "<meta http-equiv=refresh content=2;URL='formulir.php'>";

    }
    ?>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
mysqli_query($koneksi, "insert into barang set
nama = '$_POST[nama]',
nrp = '$_POST[nrp]',
kelas = '$_POST[kelas]'");

echo "Data Barang Sudah Tersimpan";
}
?>