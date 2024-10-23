<?php
include 'koneksi.php';

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT * FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4; 
            color: #333; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            flex-direction: column;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            background: #fff; 
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px; 
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold; 
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px; 
        }

        button {
            background-color: #007BFF; 
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px; 
        }

        button:hover {
            background-color: #0056b3; 
        }

        p {
            color: red; 
            margin-top: 10px;
        }

        .register-link {
            margin-top: 15px;
            text-align: center;
        }

        .register-link a {
            color: #007BFF;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .success {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <?php 
    if (isset($_SESSION['success'])) {
        echo "<p class='success'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
    ?>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>

        <div class="register-link">
            Belum punya akun? <a href="register.php">Register di sini</a>
        </div>
    </form>

    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
</body>
</html>