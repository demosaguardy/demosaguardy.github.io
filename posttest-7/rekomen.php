<?php
session_start();
require 'koneksi.php';

$query = "SELECT * FROM rekomen_user";
$result = mysqli_query($conn, $query);

$rekomen = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rekomen[] = $row;
}

if (isset($_GET['search'])) {
    $search = $_GET['keyword'];
    $sql = mysqli_query($conn, "SELECT * FROM rekomen_user WHERE film_fav LIKE '%$search%' OR
      genre LIKE '%$search%'");
    $rekomen = [];
    while ($row = mysqli_fetch_assoc($sql)) {
      $rekomen[] = $row;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User's Recommend</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="rekomen.css">
    <link rel="stylesheet" href="crud.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php include("navbar.php") ?>
    <header>
        <div>
            <h1>Filmefy</h1>
        </div>
        <?php include("navbar.php") ?>
    </header>
    <main>
        <div>
            <h1 class="t">User's Favorite</h1>
        </div>
        <search>
            <form action="" method="GET" class="search-bar">
                <input type="text" name="keyword" placeholder="Cari Film atau Genre di sini" class="search-input" required />
                <button type="submit" name="search" class="search-button">
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                </button>
            </form>
        </search>
        <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'user') : ?>
            <div class="containera">
                <div class="tambah">
                    <a href="tambah.php" class="text">Tambah</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="containert">
            <table class="rtable">
                <tr class="table-row">
                    <th class="table-head">NO</th>
                    <th class="table-head">Foto</th>
                    <th class="table-head">Nama</th>
                    <th class="table-head">Film/Series <br> Recommend </th>
                    <th class="table-head">Genre</th>
                    <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'admin') : ?>
                        <th class="table-head">Aksi</th>
                    <?php endif; ?>
                </tr>
                <?php $i = 1;
                foreach ($rekomen as $rekomen_user) : ?>
                    <tr>
                        <td class="table-data"><?php echo $i; ?></td>
                        <td class="table-data">
                            <img src="img/<?php echo $rekomen_user['foto'] ?>" alt="<?php echo $rekomen_user['foto'] ?>">
                            <div class="file-name">
                                <?php echo $rekomen_user['foto'];  ?>
                            </div>
                        </td>
                        <td class="table-data"><?php echo $rekomen_user['nama'] ?></td>
                        <td class="table-data"><?php echo $rekomen_user['film_fav'] ?></td>
                        <td class="table-data"><?php echo $rekomen_user['genre'] ?></td>
                        <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'admin') : ?>
                            <td class="table-data">
                                <div class="button-UD">
                                    <a href="edit.php?id=<?php echo $rekomen_user['id'] ?>" class="btn edit-data">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $rekomen_user['id'] ?>" class="btn hapus-data" onclick="return confirm('Anda yakin ingin menghapus?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </table>
        </div>
    </main>
</body>
<script text="text/javascript" src="script.js"></script>

</html>