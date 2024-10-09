<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pelanggan WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

    header("Location: tampilan.php");
    exit;
}
?>
