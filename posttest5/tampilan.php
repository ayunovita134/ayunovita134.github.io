<?php include 'koneksi.php'; ?>

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

        td[colspan='5'] {
            text-align: center;
            font-style: italic;
            color: #888;
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
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>
