<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "crud";

$koneksi = mysqli_connect($host, $user, $password, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = isset($_POST["id_pelanggan"]) ? $_POST["id_pelanggan"] : '';
    $nama_pelanggan = isset($_POST["nama_pelanggan"]) ? $_POST["nama_pelanggan"] : '';
    $nomor_telepon = isset($_POST["nomor_telepon"]) ? $_POST["nomor_telepon"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : '';

    $sql = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, nomor_telepon, email, alamat) 
            VALUES ('$id_pelanggan', '$nama_pelanggan', '$nomor_telepon', '$email', '$alamat')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}


mysqli_close($koneksi);
?>
