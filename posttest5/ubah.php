<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM pelanggan WHERE id = $id";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Data tidak ditemukan!";
            exit;
        }
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE pelanggan SET name='$name', email='$email', phone='$phone' WHERE id=$id";

        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil diupdate!";
            header("Location: tampilan.php");
            exit;
        } else {
            echo "Gagal mengupdate data: " . mysqli_error($koneksi);
        }
    }
    ?>

    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>

        <button type="submit" name="update">Update Data</button>
    </form>
</body>
</html>
