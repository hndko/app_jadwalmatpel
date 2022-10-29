<?php
require_once "../config/config.php";

$id = $_GET['id'];
$query = "SELECT * FROM `tb_jadwal` WHERE `id_jadwal` = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $hari = htmlspecialchars($_POST['hari']);
    $jam = htmlspecialchars($_POST['jam']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $mata_pelajaran = htmlspecialchars($_POST['mata_pelajaran']);
    $pengajar = htmlspecialchars($_POST['pengajar']);

    $query = "UPDATE `tb_jadwal` SET `hari`='$hari',`jam`='$jam',`kelas`='$kelas',`mata_pelajaran`='$mata_pelajaran',`pengajar`='$pengajar' WHERE `id_jadwal`='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubahkan!');
            window.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once '../include/head.php';
    ?>
</head>

<body>
    <!-- Navbar -->
    <?php
    require_once '../include/navbar.php'
    ?>

    <!-- Main Menu -->
    <div class="container pt-3">
        <div class="card text-bg-success">
            <div class="card-header d-flex justify-content-between">
                Input Data Jadwal
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-3">
                        <label for="hari" class="col-sm-2 col-form-label">Input Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hari" id="hari" maxlength="20" autocomplete="off" value="<?= $data['hari'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jam" class="col-sm-2 col-form-label">Input Jam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jam" id="jam" maxlength="10" autocomplete="off" value="<?= $data['jam'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Input Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kelas" id="kelas" maxlength="3" autocomplete="off" value="<?= $data['kelas'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mata_pelajaran" class="col-sm-2 col-form-label">Input Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" maxlength="40" autocomplete="off" value="<?= $data['mata_pelajaran'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pengajar" class="col-sm-2 col-form-label">Input Pengajar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pengajar" id="pengajar" maxlength="100" autocomplete="off" value="<?= $data['pengajar'] ?>" required>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" name="submit" class="btn btn-light">Edit</button>
                        <a href="../index.php" class="btn btn-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    require_once '../include/javascript.php';
    ?>
</body>

</html>