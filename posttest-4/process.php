<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Results</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <header>
        <div>
            <h1>Filmefy</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <?php
            // Mendapatkan data dari form
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST["name"]);
                $age = htmlspecialchars($_POST["age"]);
                $password = htmlspecialchars($_POST["password"]);

                // Menampilkan hasil inputan
                echo "<h2>Submitted Data:</h2>";
                echo "<p><strong>Name:</strong> " . $name . "</p>";
                echo "<p><strong>Age:</strong> " . $age . "</p>";
                echo "<p><strong>Password:</strong> " . str_repeat("*", strlen($password)) . "</p>"; // Menyembunyikan password
            } else {
                echo "<p>No data submitted.</p>";
            }
            ?>
        </div>
        <div class="containerb">
            <div class="back">
                <a href="index.php" class="text">kembali</a>
            </div>
        </div>
    </main>

    <footer>
        <p>© 2024 Filmefy. All rights reserved.</p>
    </footer>
</body>

</html>