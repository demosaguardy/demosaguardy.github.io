<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM rekomen_user WHERE id = $id";
$result = mysqli_query($conn, $query);

$rekomen = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rekomen[] = $row;
}

$rekomen = $rekomen[0]; 
if (isset($_POST['update'])) {  
    $nama = $_POST['nama'];
    $film = $_POST['film_fav'];
    $genre = $_POST['genre'];

    $query = "UPDATE rekomen_user SET nama = '$nama', film_fav = '$film', genre = '$genre' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "
        <script> 
        alert('berhasil mengubah film favorite');
        document.location.href = 'rekomen.php';
        </script>";
    } else {
        echo "
        <script> 
        alert('gagal mengubah film favorite');
        document.location.href = 'rekomen.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>

    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="crud.css">
</head>

<body>
    <main>
        <h1>Edit Film</h1>

        <div class="containerb">
            <div class="back">
                <a href="rekomen.php" class="text">Kembali</a>
            </div>
        </div>

        <div>
            <form action="" method="post">
                <div class="input-field">
                    <label for="nama" class="label-field">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $rekomen['nama']; ?>" required>
                </div>
                <div class="input-field">
                    <label for="film_fav" class="label-field">Film Favorite</label>
                    <input type="text" name="film_fav" id="film_fav" value="<?php echo $rekomen['film_fav']; ?>" required>
                </div>
                <div class="input-field">
                    <label for="genre" class="label-field">Genre</label>
                    <input type="text" name="genre" id="genre" value="<?php echo $rekomen['genre']; ?>" required>
                </div>
                <input type="submit" value="Update" name="update" class="button">
            </form>
        </div>
    </main>
</body>

</html>
