<?php
include 'koneksi.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['dadu1'];
    $angka2 = $_POST['dadu2'];
    $angka3 = $_POST['dadu3'];

    if (!empty($angka1)) {
        $sql = "INSERT INTO daftar (id, nomor) VALUES ('', '$angka1')";
    }
    if (!empty($angka2)) {
        $sql = "INSERT INTO daftar (id, nomor) VALUES ('', '$angka2')";
    }
    if (!empty($angka3)) {
        $sql = "INSERT INTO daftar (id, nomor) VALUES ('', '$angka3')";
    }
    echo "Data berhasil ditambahkan";
    header('location:index.php');
}





?>