<?php
require 'koneksi.php';

if (isset($_POST['registrasi'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "
        <script>
        alert('Username sudah terdaftar, silakan gunakan username lain.');
        document.location.href = 'registrasi.php';
        </script>";
    } else {
        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "
            <script>
            alert('Berhasil daftar');
            document.location.href = 'login.php';
            </script>";
        } else {
            echo "
            <script>
            alert('Gagal daftar');
            document.location.href = 'registrasi.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Filmefy</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <header>
        <div>
            <h1>Filmefy <br> Registrasi</h1>
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
                <div>
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select><br>
                </div>
                <p>Sudah punya akun? login <a href="login.php">di sini!</a></p>
                <div>
                    <button type="submit" name="registrasi" >Registrasi</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>© 2024 Filmefy. All rights reserved.</p>
    </footer>
</body>

</html>