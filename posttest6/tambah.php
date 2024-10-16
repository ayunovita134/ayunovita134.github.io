<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; 
            color: #333; 
            line-height: 1.6; 
        }

        nav {
            background-color: #007BFF; 
            padding: 10px 0;
        }

        nav .menu {
            text-align: center; 
        }

        nav ul {
            list-style: none; 
        }

        nav ul li {
            display: inline; 
            margin: 0 15px; 
        }

        nav a {
            color: white; 
            text-decoration: none; 
            font-weight: bold; 
        }

        h1 {
            text-align: center; 
            margin: 20px 0; 
        }

        form {
            max-width: 600px; 
            margin: 20px auto; 
            padding: 20px; 
            background: white; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }

        label {
            display: block;
            margin-bottom: 5px; 
            font-weight: bold; 
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%; 
            padding: 10px; 
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            font-size: 16px; 
        }

        button {
            background-color: #007BFF; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 16px; 
        }

        button:hover {
            background-color: #0056b3; 
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
    <h1>Tambah Data Pelanggan</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="id_pelanggan">ID Pelanggan:</label>
        <input type="text" id="id_pelanggan" name="id_pelanggan" required>

        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="number" id="nomor_telepon" name="nomor_telepon" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="foto">Upload Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>

        <button type="submit" name="submit">Tambah Data</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        $nomor_telepon = filter_var($_POST['nomor_telepon'], FILTER_SANITIZE_NUMBER_INT);
        if ($nomor_telepon) {
            echo "Nomor telepon valid: ".$nomor_telepon;
        } else {
            echo "Nomor telepon tidak valid";
        }

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Maaf, file sudah ada.";
            $uploadOk = 0;
        }

        if ($_FILES["foto"]["size"] > 500000) {
            echo "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Maaf, gambar Anda tidak ter-upload.";
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $stmt = $koneksi->prepare("INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, nomor_telepon, email, alamat, foto) VALUES (?, ?, ?, ?, ?, ?)");
                $image_path = basename($_FILES["foto"]["name"]); 
                $stmt->bind_param("ssssss", $id_pelanggan, $nama_pelanggan, $nomor_telepon, $email, $alamat, $foto);

                if ($stmt->execute()) {
                    echo "Data berhasil ditambahkan";
                } else {
                    echo "Gagal menambahkan data: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Maaf, terjadi kesalahan saat meng-upload gambar.";
            }
        }
    }
    ?>
</body>
</html>
