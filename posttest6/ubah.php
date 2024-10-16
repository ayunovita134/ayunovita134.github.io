<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pelanggan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        nav {
            background-color: #007BFF;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav .menu {
            text-align: center;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            display: inline;
            margin: 0 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffd700;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #007BFF;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #007BFF;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            form {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            nav ul li {
                display: block;
                margin: 10px 0;
            }
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

    <h1>Update Data Pelanggan</h1>

    <?php
    if (isset($_GET['id_pelanggan'])) {
        $id_pelanggan = $_GET['id_pelanggan'];
        $sql = "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "<p>Data tidak ditemukan!</p>";
            exit;
        }
    }

    if (isset($_POST['update'])) {
        $nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
        $nomor_telepon = mysqli_real_escape_string($koneksi, $_POST['nomor_telepon']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    
        // Query yang sudah diperbaiki
        $sql = "UPDATE pelanggan SET 
                nama_pelanggan='$nama_pelanggan', 
                nomor_telepon='$nomor_telepon', 
                email='$email', 
                alamat='$alamat' 
                WHERE id_pelanggan=$id_pelanggan";
    
        if (mysqli_query($koneksi, $sql)) {
            echo "<p>Data berhasil diupdate!</p>";
            header("Location: tampilan.php");
            exit;
        } else {
            echo "<p>Gagal mengupdate data: " . mysqli_error($koneksi) . "</p>";
        }
    }
    
    ?>

    <form action="" method="POST">
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="number" id="nomor_telepon" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea>

        <button type="submit" name="update">Update Data</button>
    </form>
</body>
</html>


