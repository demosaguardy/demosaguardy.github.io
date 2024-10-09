<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $film = $_POST['film_fav'];
    $genre = $_POST['genre'];

    $query = "INSERT INTO rekomen_user (nama, film_fav, genre) VALUES('$nama', '$film', '$genre')";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"
        <script> 
        alert('berhasil menambah film favorite');
        document.location.href = 'rekomen.php';
        </script>";
    } else{
        echo"
        <script> 
        alert('gagal menambah film favorite');
        document.location.href = 'rekomen.php';
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
    <title>Tambah Film Favorite</title>

    <link rel="stylesheet" href="form.css" />

    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="crud.css">
</head>

<body>
    <main>
        <h1 >
            Tambah Film Favorite
        </h1>

        <div class="containerb">
            <div class="back">
                <a href="rekomen.php" class="text">Kembali</a>
            </div>
        </div>

        <div >
            <form action="" method="post">
                <div class="input-field">
                    <label for="nama" class="label-field">Nama</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div class="input-field">
                    <label for="film_fav" class="label-field">Film Favorite</label>
                    <input type="text" name="film_fav" id="film_fav" required>
                </div>
                <div class="input-field">
                    <label for="genre" class="label-field">genre</label>
                    <input type="text" name="genre" id="genre" required>
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
    </main>
</body>

</html>