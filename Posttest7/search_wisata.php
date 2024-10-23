<?php
include 'koneksi.php';

if (isset($_POST['search'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_POST['search']);
    
    $sql = "SELECT * FROM wisata WHERE nama_wisata LIKE '%$keyword%'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='wisata-item'>";
            echo "<h3>" . htmlspecialchars($row['nama_wisata']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['deskripsi']) . "</p>";

            if (isset($row['foto'])) {
                echo "<img src='" . htmlspecialchars($row['foto']) . "' alt='" . htmlspecialchars($row['nama_wisata']) . "' width='200'>";
            } else {
                echo "<p>Gambar tidak tersedia.</p>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada hasil ditemukan untuk '<strong>" . htmlspecialchars($keyword) . "</strong>'</p>";
    }
}
?>
