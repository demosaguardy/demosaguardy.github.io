<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $film = $_POST['film_fav'];
    $genre = $_POST['genre'];

    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];

    $validExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtensions = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($fileExtensions, $validExtensions)) {
        echo "
        <script> alert('Tolong masukkan file gambar dengan format jpg, jpeg, atau png');</script>";
    } else {
        date_default_timezone_set("Asia/Makassar");
        $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtensions;

        if (move_uploaded_file($tmp_name, 'img/' . $new_file_name)) {
            $query = "INSERT INTO rekomen_user (nama, film_fav, genre, foto) VALUES ('$nama', '$film', '$genre', '$new_file_name')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "
                <script> 
                alert('Berhasil menambah film favorite');
                document.location.href = 'rekomen.php';
                </script>";
            } else {
                echo "
                <script> 
                alert('Gagal menambah film favorite');
                document.location.href = 'rekomen.php';
                </script>";
            }
        } else {
            echo "
            <script> 
            alert('Gagal mengupload gambar');
            document.location.href = 'tambah.php';
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label for="nama" class="label-field">Nama</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div class="input-field">
                    <label for="film_fav" class="label-field">Film Favorite</label>
                    <input type="text" name="film_fav" id="film_fav" required>
                </div>
                <div class="input-field">
                    <label for="genre" class="label-field">Genre</label>
                    <input type="text" name="genre" id="genre" required>
                </div>
                <div class="input-field">
                    <label for="foto" class="label-field">Poster Film</label>
                    <input type="file" name="foto" id="foto" style="border: 1px solid rgba(0,0,0.6); border-radius:9px; padding:7px 10px; font-size:16px ;"require>
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
    </main>
</body>

</html>