<?php
require_once "config/config.php";

$query = "SELECT * FROM `tb_jadwal`";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once 'include/head.php';
  ?>
</head>

<body>
  <!-- Navbar -->
  <?php
  require_once 'include/navbar.php'
  ?>

  <!-- Main Menu -->
  <div class="container pt-3">
    <div class="card text-bg-success">
      <div class="card-header d-flex justify-content-between">
        Jadwal Mata Pelajaran
        <a href="<?= $base_url ?>jadwal/add.php" class="btn btn-light btn-sm">Tambah Data</a>
      </div>
      <div class="card-body">
        <table id="data-jadwal" class="table text-white" style="width: 100%;">
          <thead>
            <tr>
              <th>Hari</th>
              <th>Jam</th>
              <th>Kelas</th>
              <th>Mata Pelajaran</th>
              <th>Pengajar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $row) : ?>
              <tr>
                <td><?= $row['hari'] ?></td>
                <td><?= $row['jam'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['mata_pelajaran'] ?></td>
                <td><?= $row['pengajar'] ?></td>
                <td>
                  <a href="<?= $base_url ?>jadwal/edit.php?id=<?= $row['id_jadwal'] ?>" class="btn btn-light btn-sm">Edit</a>
                  <a href="<?= $base_url ?>jadwal/delete.php?id=<?= $row['id_jadwal'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php
  require_once 'include/javascript.php';
  ?>
</body>

</html>