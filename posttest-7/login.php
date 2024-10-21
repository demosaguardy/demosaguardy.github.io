<?php
session_start(); 
require 'koneksi.php'; 

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            if ($user['role'] === 'admin') {
                $_SESSION['role'] = 'admin'; 
                echo "
                <script>
                alert('Login berhasil! Selamat datang Admin.');
                document.location.href = 'rekomen.php'; 
                </script>
                ";
            } else {
                $_SESSION['role'] = 'user'; 
                echo "
                <script>
                alert('Login berhasil! Selamat datang User.');
                document.location.href = 'index.php'; 
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Password salah! Silakan coba lagi.');
            document.location.href = 'login.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Username tidak ditemukan! Silakan daftar.');
        document.location.href = 'registrasi.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Filmefy</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <header>
        <div>
            <h1>Filmefy <br> Login</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <form action="" method="POST">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <p>Belum punya akun? daftar <a href="registrasi.php">di sini!</a></p>
                <div>
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>© 2024 Filmefy. All rights reserved.</p>
    </footer>
</body>

</html>