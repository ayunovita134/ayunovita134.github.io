<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Wisata</title>
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
            color: #007BFF;
        }

        form {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="file"] {
            padding: 10px 0;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

    </style>
</head>
<body>
    <nav>
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tambah.php">Tambah Wisata</a></li>
                <li><a href="tampilan.php">Data Wisata</a></li>
            </ul>
        </div>
    </nav>
    <h1>Tambah Data Wisata Baru</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id_wisata">ID Wisata:</label>
            <input type="text" id="id_wisata" name="id_wisata" required 
                   placeholder="Masukkan ID wisata">
        </div>

        <div class="form-group">
            <label for="nama_wisata">Nama Tempat Wisata:</label>
            <input type="text" id="nama_wisata" name="nama_wisata" required 
                   placeholder="Masukkan nama tempat wisata">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori Wisata:</label>
            <select id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Alam">Wisata Alam</option>
                <option value="Budaya">Wisata Budaya</option>
                <option value="Kuliner">Wisata Kuliner</option>
                <option value="Sejarah">Wisata Sejarah</option>
                <option value="Religi">Wisata Religi</option>
                <option value="Pantai">Wisata Pantai</option>
                <option value="Edukasi">Wisata Edukasi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" required 
                   placeholder="Masukkan lokasi/alamat lengkap">
        </div>

        <div class="form-group">
            <label for="harga_tiket">Harga Tiket (Rp):</label>
            <input type="number" id="harga_tiket" name="harga_tiket" required 
                   placeholder="Masukkan harga tiket">
        </div>

        <div class="form-group">
            <label for="jam_operasional">Jam Operasional:</label>
            <input type="text" id="jam_operasional" name="jam_operasional" required 
                   placeholder="Contoh: 08:00 - 17:00">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required 
                      placeholder="Masukkan deskripsi lengkap tempat wisata"></textarea>
        </div>

        <div class="form-group">
            <label for="foto">Upload Foto Wisata:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
            <small style="color: #666;">Format yang diperbolehkan: JPG, JPEG, PNG. Maksimal 5MB</small>
        </div>

        <button type="submit" name="submit">Tambah Data Wisata</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $id_wisata = $_POST['id_wisata'];
        $nama_wisata = $_POST['nama_wisata'];
        $kategori = $_POST['kategori'];
        $lokasi = $_POST['lokasi'];
        $harga_tiket = $_POST['harga_tiket'];
        $jam_operasional = $_POST['jam_operasional'];
        $deskripsi = $_POST['deskripsi'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check === false) {
            echo "<div class='alert alert-danger'>File bukan gambar.</div>";
            $uploadOk = 0;
        }

        if ($_FILES["foto"]["size"] > 5000000) {
            echo "<div class='alert alert-danger'>Maaf, ukuran file terlalu besar. Maksimal 5MB.</div>";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<div class='alert alert-danger'>Maaf, hanya file JPG, JPEG, & PNG yang diperbolehkan.</div>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<div class='alert alert-danger'>Maaf, file tidak dapat diupload.</div>";
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $stmt = $koneksi->prepare("INSERT INTO wisata (id_wisata, nama_wisata, kategori, lokasi, harga_tiket, jam_operasional, deskripsi, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $foto = basename($_FILES["foto"]["name"]);
                $stmt->bind_param("ssssssss", $id_wisata, $nama_wisata, $kategori, $lokasi, $harga_tiket, $jam_operasional, $deskripsi, $foto);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Data wisata berhasil ditambahkan!</div>";
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = 'tampilan.php';
                            }, 2000);
                          </script>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan data: " . $stmt->error . "</div>";
                }
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Maaf, terjadi kesalahan saat mengupload gambar.</div>";
            }
        }
    }
    ?>
</body>
</html>