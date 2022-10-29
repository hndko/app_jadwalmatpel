<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_jadwalmatpel";

$koneksi = mysqli_connect($server, $user, $password, $nama_database);

if (!$koneksi) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

$base_url = "http://localhost/app_jadwalmatpel/";
