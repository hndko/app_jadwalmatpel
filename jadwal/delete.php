<?php
require_once "../config/config.php";

$id = $_GET['id'];
$query = "DELETE FROM `tb_jadwal` WHERE `id_jadwal` = '$id'";
$result = mysqli_query($koneksi, $query);
if ($result > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapuskan!');
            window.location.href = '../index.php';
        </script>
        ";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
