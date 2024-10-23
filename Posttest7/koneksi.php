<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "crud";

$koneksi = mysqli_connect($host, $user, $password, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$search = $_GET['search'];

$sql = "SELECT * FROM tempat_wisata WHERE nama LIKE '%$search%' OR lokasi LIKE '%$search%' OR kategori LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode([]);
}

$conn->close();
?>
