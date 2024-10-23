<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Wisata</title>
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

    <h1>Update Data Wisata</h1>

    <?php
    if (isset($_GET['id_wisata'])) {
        $id_wisata = $_GET['id_wisata'];
        $sql = "SELECT * FROM wisata WHERE id_wisata = $id_wisata";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "<p>Data tidak ditemukan!</p>";
            exit;
        }
    }

    if (isset($_POST['update'])) {
        $nama_wisata = mysqli_real_escape_string($koneksi, $_POST['nama_wisata']);
        $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
        $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
        $harga_tiket = mysqli_real_escape_string($koneksi, $_POST['harga_tiket']);
        $jam_operasional = mysqli_real_escape_string($koneksi, $_POST['jam_operasional']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        $foto = mysqli_real_escape_string($koneksi, $_POST['foto']);

        // Query update data wisata
        $sql = "UPDATE wisata SET 
                nama_wisata='$nama_wisata', 
                kategori='$kategori', 
                lokasi='$lokasi', 
                harga_tiket='$harga_tiket', 
                jam_operasional='$jam_operasional', 
                deskripsi='$deskripsi', 
                foto='$foto'
                WHERE id_wisata=$id_wisata";

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
        <label for="nama_wisata">Nama Wisata:</label>
        <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo $row['nama_wisata']; ?>" required>

        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required>

        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" value="<?php echo $row['lokasi']; ?>" required>

        <label for="harga_tiket">Harga Tiket:</label>
        <input type="number" id="harga_tiket" name="harga_tiket" value="<?php echo $row['harga_tiket']; ?>" required>

        <label for="jam_operasional">Jam Operasional:</label>
        <input type="text" id="jam_operasional" name="jam_operasional" value="<?php echo $row['jam_operasional']; ?>" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>

        <label for="foto">Foto (URL):</label>
        <input type="text" id="foto" name="foto" value="<?php echo $row['foto']; ?>" required>

        <button type="submit" name="update">Update Data</button>
    </form>
</body>
</html>
