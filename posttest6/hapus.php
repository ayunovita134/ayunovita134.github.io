<?php
include 'koneksi.php';

if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    $sql = "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href='tampilan.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location.href='tampilan.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID pelanggan tidak ditemukan!');
            window.location.href='tampilan.php';
          </script>";
}
?>
