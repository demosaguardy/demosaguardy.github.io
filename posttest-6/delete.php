<?php
require 'koneksi.php';
$id= $_GET['id'];

$FindQuery= mysqli_query($conn,"SELECT * FROM rekomen_user WHERE id ='$id'");
$rekomen = [];
while($rekomen_user = mysqli_fetch_assoc($FindQuery)){
    $rekomen[]=$rekomen_user;
}

unlink('img/'.$rekomen[0]['foto']);

    $query = "DELETE FROM rekomen_user WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "
        <script> 
        alert('Berhasil menghapus film!');
        document.location.href = 'rekomen.php';
        </script>";
    } else {
        echo "
        <script> 
        alert('Gagal menghapus film!');
        document.location.href = 'rekomen.php';
        </script>";
    }

?>