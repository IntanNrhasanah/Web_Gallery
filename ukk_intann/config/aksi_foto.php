<?php
session_start();
include 'koneksi.php';

if(isset($_POST)){
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date(Y-m-d);
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$albumid','$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/foto.php';
   </script> ";
}

if(isset($_POST['edit'])){
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

if($foto == null) {
    $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid='$albumid', WHERE fotoid='$fotoid'");
}else{
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    if (is_file('../assets/img/' .$data['lokasifile'])){
        unlink('../assets/img/' .$data['lokasifile']);
    }
    move_uploaded_file($tmp, $lokasi.$namafoto);
    $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', lokasifile='$namafoto', albumid='$albumid', WHERE fotoid='$fotoid'");
 }
 echo "<script>
 alert('Data berhasil diperbarui!');
 location.href='../admin/foto.php';
 </script>";

}