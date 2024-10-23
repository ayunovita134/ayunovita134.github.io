<?php
include 'koneksi.php';

if (isset($_GET['id_wisata'])) {
    $id_wisata = $_GET['id_wisata'];

    $sql = "DELETE FROM wisata WHERE id_wisata = $id_wisata";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data wisata berhasil dihapus!');
                window.location.href='tampilan.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data wisata!');
                window.location.href='tampilan.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID wisata tidak ditemukan!');
            window.location.href='tampilan.php';
          </script>";
}
?>
