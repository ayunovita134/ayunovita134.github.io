<?php include 'koneksi.php'; 

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        nav {
            background-color: #007BFF;
            color: white;
            padding: 10px 0;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        .menu ul li {
            display: inline;
            margin: 0 15px;
        }

        .menu ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td[colspan='7'] {
            text-align: center;
            font-style: italic;
            color: #888;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <nav>
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tambah.php">Tambah Data</a></li>
                <li><a href="tampilan.php">Tampilkan Data</a></li>
            </ul>
        </div>
    </nav>
    
    <h1>Daftar Pelanggan</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        $sql = "SELECT * FROM pelanggan";
        $result = mysqli_query($koneksi, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["id_pelanggan"] . "</td>
                        <td>" . $row["nama_pelanggan"] . "</td>
                        <td>" . $row["nomor_telepon"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["alamat"] . "</td>
                        <td><img src='" . htmlspecialchars($row['uploads']) . "' alt='Customer Image' width='100' height='100'></td>
                        <td>
                            <div class='action-buttons'>
                                <a class='edit-btn' href='ubah.php?id_pelanggan=" . $row["id_pelanggan"] . "'>Edit</a>
                                <a class='delete-btn' href='hapus.php?id_pelanggan=" . $row["id_pelanggan"] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
                            </div>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Belum ada data</td></tr>";
        }
        
        ?>
    </table>
</body>
</html>
