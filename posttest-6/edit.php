<?php
require "koneksi.php";

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

    $oldimg = $_POST['oldimg'];  

    if ($_FILES['foto']['error'] === 4) {
        $new_file_name = $oldimg;
    } else {
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_name = $_FILES['foto']['name'];

        $validExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtensions = explode(".", $file_name);
        $fileExtensions = strtolower(end($fileExtensions));
        $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtensions;

        if (!in_array($fileExtensions, $validExtensions)) {
            echo "<script>alert('Tolong masukkan file gambar');</script>";
        } else {
   
            move_uploaded_file($tmp_name, 'img/' . $new_file_name);

            if (file_exists('img/' . $oldimg)) {
                unlink('img/' . $oldimg);  
            }
        }
    }

    $query = "UPDATE rekomen_user SET nama = '$nama', film_fav = '$film', genre = '$genre', foto = '$new_file_name' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <script> 
        alert('Berhasil mengubah film favorit');
        document.location.href = 'rekomen.php';
        </script>";
    } else {
        echo "
        <script> 
        alert('Gagal mengubah film favorit');
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
            <form action="" method="post" enctype="multipart/form-data">
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
                <div class="input-field" style="border: 1px solid rgba(0,0,0.6); border-radius:9px; padding:7px 10px; font-size:16px;">
                    <label for="foto" class="label-field">Poster Film</label>
                    <input type="file" name="foto" id="foto">
                    <br>
                    <img src="img/<?php echo $rekomen['foto']?>" alt="img/<?php echo $rekomen['foto']?>" width="80px" height="100px">
                    <input type="hidden" name="oldimg" value="<?php echo $rekomen['foto']; ?>">  <!-- Simpan nama file lama -->
                </div>
                <input type="submit" value="Update" name="update" class="button">
            </form>
        </div>
    </main>
</body>

</html>
