<?php
session_start();
include 'koneksi.php';

$fotoid = $_POST['fotoid'];
$userid = $_POST['userid'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar= $_POST['tanggalkomentar'];

$query = mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

echo"<script>
    location.href='../admin/index.php'
</script>"
?>