<?php
require 'koneksi.php';


$id = $_GET['id'];

$query = "DELETE FROM rekomen_user WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "
    <script>
        alert('Data berhasil dihapus');
        document.location.href = 'rekomen.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'rekomen.php';
    </script>";
}
?>
